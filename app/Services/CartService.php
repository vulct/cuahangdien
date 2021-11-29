<?php

namespace App\Services;

use App\Services\Admin\ProductService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class CartService
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function create($product_id, $attribute_id, $qty): bool
    {
        $check_product = $this->productService->getProductIsActive($product_id);

        $check_attr_of_product = $this->productService->getAttributesOfProduct($product_id, $attribute_id);

        if ($qty <= 0 || $product_id <= 0 || $attribute_id <= 0) {
            return false;
        }

        if (is_null($check_product) || is_null($check_attr_of_product)){
            return false;
        }

        $carts = Session::get('carts');

        if (is_null($carts)) {
            Session::put('carts', [
                $attribute_id => ['product' =>$product_id,'qty' => $qty]
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $attribute_id);

        if ($exists) {
            $carts[$attribute_id]['qty'] += $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$attribute_id]['qty'] = $qty;

        Session::put('carts', $carts);

        return true;
    }
}
