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

        $data['products'] = Product::where(['isDelete' => 0, 'active' => 1])->withExists(['attributes' => function ($q) use ($keyword) {
            $q->where(['isDelete' => 0])
                ->where('codename', 'like', "%{$keyword}%")
                ->orWhere('type_name', 'like', "%{$keyword}%");
        }])->where('name', 'like', "%{$keyword}%")
            ->orWhere(function ($query) use ($keyword) {
                $query->where('meta_title', 'like', "%{$keyword}%");
                $query->where('content', 'like', "%{$keyword}%");
                $query->where('keyword', 'like', "%{$keyword}%");
            })
            ->latest()
            ->paginate(20);

        $data['categories'] = Category::where(['isDelete' => 0, 'active' => 1, 'type' => 0])
            ->where('name', 'like', "%{$keyword}%")
            ->orWhere(function ($query) use ($keyword) {
                $query->where('meta_title', 'like', "%{$keyword}%");
                $query->where('keyword', 'like', "%{$keyword}%");
            })
            ->get();

        $data['brands'] = Brand::where(['isDelete' => 0, 'active' => 1])
            ->where('name', 'like', "%{$keyword}%")
            ->orWhere(function ($query) use ($keyword) {
                $query->where('meta_title', 'like', "%{$keyword}%");
            })
            ->get();

        return $data;
    }
}
