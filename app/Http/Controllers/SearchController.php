<?php

namespace App\Http\Controllers;

use App\Services\Admin\BrandService;
use App\Services\SearchService;
use Illuminate\Http\Request;


class SearchController
{
    protected $searchService;
    protected $brandService;

    public function __construct(SearchService $searchService, BrandService $brandService)
    {
        $this->searchService = $searchService;
        $this->brandService = $brandService;
    }

    public function index()
    {
        return view('admin.search.index', [
            'title' => 'Kết quả tìm kiếm: '
        ]);
    }

    public function resultSearch(Request $request)
    {

        $keyword = trim(strip_tags($request->get('q')));

        $result = $this->searchService->findByKey($keyword);

        $brands = $this->brandService->get(1);

        $brand_of_product = [];

        foreach ($brands as $brand) {
            $brand_of_product[$brand->id] = $brand;
        }

        // get list products if isset product with keyword
        isset($result['products']) ? $products = $result['products'] : $products = [];
        //brands
        isset($result['brands']) ? $brands = $result['brands'] : $brands = [];
        // categories
        isset($result['categories']) ? $categories = $result['categories'] : $categories = [];

        return view('admin.search.index', [
            'title' => 'Kết quả tìm kiếm: ' . $keyword,
            'keyword' => $keyword,
            'products' => $products,
            'count' => $products->count(),
            'brands' => $brands,
            'categories' => $categories,
            'brand_of_product' => $brand_of_product
        ]);
    }
}
