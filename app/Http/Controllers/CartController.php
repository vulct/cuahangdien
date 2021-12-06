<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Services\Admin\ProductService;
use App\Services\Admin\ShippingService;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected $cartService;
    protected $productService;
    protected $shippingService;

    public function __construct(CartService $cartService,ProductService $productService, ShippingService $shippingService)
    {
        $this->cartService = $cartService;
        $this->productService = $productService;
        $this->shippingService = $shippingService;
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
        // get product
        $products = $this->cartService->getProduct();
        // get cart
        $carts = Session::get('carts');
        // get method shipping
        $list_method_ship = $this->shippingService->getMethodIsActive();
        if ($carts){
            return view('carts.checkout',[
                'total' => $this->cartService->totalCart(),
                'shipping' => $list_method_ship,
                'products' => $products,
                'carts' => $carts
            ]);
        }
        return redirect()->route('cart');
    }

    public function show()
    {
        $carts = Session::get('carts');
        $total = $this->cartService->totalCart();
        $products = $this->cartService->getProduct();
        return view('carts.list', [
            'title' => 'Sản phẩm đã chọn',
            'products' => $products,
            'carts' => $carts,
            'total' => $total
        ]);
    }

    public function deleteItemInCart(Request $request): JsonResponse
    {
        $id = (int)$request->item;
        $result = $this->cartService->delete($id);
        if ($result){
            $message = 'Xoá sản phẩm thành công!!!';
            return response()->json(['message' => $message, 'error' => false]);
        }
        $message = 'Xoá sản phẩm không thành công!!!';
        return response()->json(['message' => $message, 'error' => true]);
    }

    public function update(Request $request): JsonResponse
    {
        $id = (int)$request->item;

        $qty = (int)$request->qty;

        $result = $this->cartService->update($id,$qty);

        if ($result){
            $carts = Session::get('carts');
            // total cart
            $total = 0;
            $subtotal = 0;
            foreach ($carts as $key => $cart){
                $price = $cart['discount'] != 0 ? ($cart['price'] - $cart['price']*$cart['discount']/100)*$cart['qty'] : $cart['price']*$cart['qty'];
                $total += $price;
                // subtotal of id
                if ($key == $id){
                    $subtotal += $price;
                }
            }

            $message = 'Cập nhật số lượng sản phẩm thành công!!!';

            return response()->json([
                'key' => $id,
                'total' => number_format($total),
                'subtotal' => number_format($subtotal),
                'message' => $message,
                'error' => false
            ]);
        }
        $message = 'Cập nhật số lượng sản phẩm không thành công!!!';
        return response()->json(['message' => $message, 'error' => true]);
    }

    public function addOrder(OrderRequest $request): JsonResponse
    {

        $result = $this->cartService->addOrder($request);

        if ($result){
            $message = 'Đặt hàng thành công!!!';
            return response()->json([
                'message' => $message,
                'error' => false]);
        }
        $message = 'Đặt hàng không thành công, vui lòng kiểm tra lại thông tin.';
        return response()->json(['message' => $message, 'error' => true]);
    }
}
