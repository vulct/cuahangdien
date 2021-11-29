<?php

namespace App\Http\Controllers;

use App\Services\Admin\ProductService;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;
    protected $productService;

    public function __construct(CartService $cartService,ProductService $productService)
    {
        $this->cartService = $cartService;
        $this->productService = $productService;
    }

    public function addToCart(Request $request): JsonResponse
    {
        $qty = (int)$request->num_product ?? 1;

        $product_id = (int)$request->product_id;

        $attribute_id = (int)$request->attribute_id;

        $result = $this->cartService->create($product_id, $attribute_id, $qty);

        if ($result === false) {
            $message = 'Thêm sản phẩm không thành công, vui lòng kiểm tra lại';
            return response()->json(['message' => $message, 'error' => true]);
        }

        $carts = Session::get('carts')[$attribute_id];

        $product = $this->productService->getDetailProduct($product_id);
        $attribute = $this->productService->getAttributesOfProduct($product_id, $attribute_id);

        $html = view('guest.layouts.add-cart', compact(['carts','product','attribute']))->render();

        return response()->json($html);
    }

    public function checkout()
    {
        //
    }
}
