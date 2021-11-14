<?php

namespace App\Http\View\Composers;

use App\Services\Admin\ProductService;
use Illuminate\View\View;
use function PHPUnit\Framework\isEmpty;

class ProductComposer
{
    protected $products = [];

    public function __construct(ProductService $productService)
    {
        $this->products = $productService->getProductWithCategoryIsActive();
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
//        var_dump($data[0]->products[0]['attributes'][0]['discount']);
//        echo '</pre>';
//        die();

        $view->with('categories', $data);
    }
}
