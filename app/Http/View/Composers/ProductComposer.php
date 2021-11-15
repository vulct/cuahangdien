<?php

namespace App\Http\View\Composers;

use App\Services\Admin\CategoryService;
use App\Services\Admin\ProductService;
use Illuminate\View\View;
use function PHPUnit\Framework\isEmpty;

class ProductComposer
{
    protected $products = [];
    protected $categoryService;

    public function __construct(ProductService $productService, CategoryService $categoryService)
    {
        $this->products = $productService->getProductWithCategoryIsActive();
        $this->categoryService = $categoryService;
    }

    public function compose(View $view)
    {
        $listProduct = $this->products;
        $data = [];
        foreach ($listProduct as $product){
            if (!$product['products']->isEmpty()){
                $data[] = $product;
            }
        }

//        echo '<pre>';
//        var_dump($data);
//        echo '</pre>';
//        die();

        $view->with('categories', $data);
    }
}
