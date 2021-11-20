<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Services\Admin\BrandService;
use App\Services\Admin\CategoryService;
use App\Services\Admin\ProductService;

class BrandController
{
    protected $category;
    protected $brands;
    protected $productService;

    public function __construct(CategoryService $categoryService, BrandService $brandService, ProductService $productService)
    {
        $this->category = $categoryService;

        $this->brands = $brandService;

        $this->productService = $productService;

    }

    public function list()
    {
        $brands = $this->brands->getBrandsWithCategory();
        $data = array();

        // lấy thương hiệu
        foreach ($this->category->get(1) as $cate) {
            foreach ($brands as $brand){
                if ($brand->category_id === $cate->id)
                    $data['brands'][$cate->id] = $brands;
            }
        }

        return view('guest.brands.list', [
            'title' => 'Danh sách thương hiệu sản phẩm',
            'brands' => $data['brands'],
            'categories' => $this->category->get(1)
        ]);
    }

    public function getProductByBrand(Brand $brand)
    {
        $title =  !empty($brand->meta_title) ? $brand->meta_title : $brand->name;

        $products = $this->brands->getProductByBrand($brand->id);

        // đếm các sản phẩm trong danh sách thư mục có sản phẩm có brand_id = $brand->id

        $categories_array = $this->category->get(1);

        $categories = $this->productService->getCategoryWithBrand($brand->id);

        $count = [];

        $cate_brand = [];
        foreach ($categories_array as $category){
            foreach ($categories as $cate){
                if ($category->id === $cate->category_id){
                    $cate_brand[] = $category;
                    isset($count[$category->id]) ? $count[$category->id]++ : $count[$category->id] = 1;
                }
            }
        }

        foreach ($categories_array as $category){
            foreach ($count as $key => $c){
                if ($category->id == $key && $category->parent_id !== 0){
                    $count[$category->parent_id] += $c;
                }
            }
        }

//        echo '<pre>';
//        print_r($cate_brand);
//        echo '</pre>';
//        die();

        return view('guest.brands.detail', [
            'title' => $title,
            'products' => $products,
            'categoryOfBrand' => $cate_brand,
            'count' => $count,
            'brand' => $brand
        ]);
    }


}
