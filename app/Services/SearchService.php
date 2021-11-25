<?php

namespace App\Services;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class SearchService
{
    public function findByKey($keyword): array
    {
        $data = [];

        $data['products'] = Product::withExists(['attributes' => function ($q) use ($keyword) {
            $q->where('isDelete', 0)
                ->where('codename', 'like', "%{$keyword}%")
                ->orWhere('type_name', 'like', "%{$keyword}%")
            ;
        }])->where(['isDelete' => 0, 'active' => 1])
            ->where('name', 'like', "%{$keyword}%")
            ->orWhere('meta_title', 'like', "%{$keyword}%")
            ->orWhere('content', 'like', "%{$keyword}%")
            ->orWhere('keyword', 'like', "%{$keyword}%")
            ->latest()
            ->paginate(4);

        $data['categories'] = Category::where(['isDelete' => 0, 'active' => 1, 'type' => 0])
            ->where('name', 'like', "%{$keyword}%")
            ->orWhere('meta_title', 'like', "%{$keyword}%")
            ->orWhere('keyword', 'like', "%{$keyword}%")
            ->get();

        $data['brands'] = Brand::where(['isDelete' => 0, 'active' => 1])
            ->where('name', 'like', "%{$keyword}%")
            ->orWhere('meta_title', 'like', "%{$keyword}%")
            ->get();

        return $data;
    }
}
