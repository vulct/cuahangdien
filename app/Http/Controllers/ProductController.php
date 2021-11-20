<?php

namespace App\Http\Controllers;

use App\Services\Admin\BrandService;
use App\Services\Admin\CategoryService;
use App\Services\Admin\ProductService;

class ProductController extends Controller
{
    protected $productService;
    protected $brandService;
    protected $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService, BrandService $brandService)
    {
        $this->productService = $productService;
        $this->brandService = $brandService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return view('guest.product.index', [
            'title' => 'Thiết Bị Diện Dân Dụng & Công nghiệp',
            'brands' => $this->brandService->get(1),
            'categories' => $this->categoryService->getParentCategory()
        ]);
    }

}
