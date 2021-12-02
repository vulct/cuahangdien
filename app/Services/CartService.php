<?php

namespace App\Services;

use App\Services\Admin\ProductService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;
use PHPUnit\Exception;

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
                $attribute_id => [
                    'product' =>$product_id,
                    'code' => $check_attr_of_product->codename,
                    'type' => $check_attr_of_product->type_name,
                    'price' => $check_attr_of_product->price,
                    'discount' => $check_attr_of_product->discount,
                    'qty' => $qty
                ]
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $attribute_id);

        if ($exists) {
            $carts[$attribute_id]['qty'] += $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$attribute_id]['product'] = $product_id;
        $carts[$attribute_id]['code'] = $check_attr_of_product->codename;
        $carts[$attribute_id]['type'] = $check_attr_of_product->type_name;
        $carts[$attribute_id]['price'] = $check_attr_of_product->price;
        $carts[$attribute_id]['discount'] = $check_attr_of_product->discount;
        $carts[$attribute_id]['qty'] = $qty;

        Session::put('carts', $carts);

        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');

        if (is_null($carts)) return [];

        foreach ($carts as $cart){
            $product_list[] = $cart['product'];
        }

        return $this->productService->getProductWhereIn($product_list);
    }

    public function delete($id): bool
    {
        $carts = Session::get('carts');
        try {
            unset($carts[$id]);
            Session::put('carts', $carts);
        }catch (Exception $exception){
            return false;
        }

        return true;
    }
}
