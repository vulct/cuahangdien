<?php

namespace App\Services;

use App\Jobs\SendMail;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\Admin\ProductService;
use App\Services\Admin\ShippingService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mail;

class CartService
{
    protected $productService;
    protected $shippingService;
    protected $orderService;

    public function __construct(ProductService $productService, ShippingService $shippingService, OrderService $orderService)
    {
        $this->productService = $productService;
        $this->shippingService = $shippingService;
        $this->orderService = $orderService;
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

        $product_list = [];

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
        }catch (\Exception $exception){
            return false;
        }

        return true;
    }

    public function update($id, $qty): bool
    {
        $carts = Session::get('carts');

        $exists = Arr::exists($carts, $id);

        if ($exists) {
            $carts[$id]['qty'] = $qty;
            Session::put('carts', $carts);
            return true;
        }

        return false;
    }

    public function addOrder($request)
    {
        try {
            DB::beginTransaction();
            $carts = Session::get('carts');

            if (is_null($carts))
                return false;

            $total = $this->totalCart();

            $shipping = $this->shippingService->getMethodByID($request->shipping_status);

            $product_latest = $this->orderService->getLatest();

            $code = 'DH'.str_pad($product_latest->id + 1, 8, "0", STR_PAD_LEFT);

            $code_name  = substr(str_shuffle("QWERTYUIOPASDFGHJKLZXCVBNM0123456789abcdefghijklmnopqrstuvwxyz"), 0, 8);

            $order = Order::create([
                'code' => $code,
                'code_name' => $code_name,
                'name' => $request->name,
                'phone' => $request->phone,
                'city' => $request->city,
                'province' => $request->province,
                'address' => $request->address,
                'email' => $request->email,
                'description' => $request->description ?? "" ,
                'total' => $total,
                'status' => 0,
                'shipping_method_id' => $shipping->id
            ]);

            // insert item
            $this->insertOrderItem($carts, $order->id);

            DB::commit();

            //send email
            SendMail::dispatch($this->orderService->searchByCodeName($order->code_name))->delay(now()->addSeconds(2));

            // remove cart
            Session::forget('carts');

            return $order->code_name;
        } catch (\Exception $err) {
            echo $err;
            DB::rollBack();
            return false;
        }
    }

    public function insertOrderItem($carts, $order_id): bool
    {
        try {
            foreach ($carts as $key => $cart) {
                $price = $cart['discount'] != 0 ? $cart['price'] - $cart['price'] * ($cart['discount'] / 100) : $cart['price'];
                OrderItem::create([
                    'quantity' => $cart['qty'],
                    'price' => $price,
                    'discount' => $cart['discount'],
                    'product_attribute_id' => $key,
                    'order_id' => $order_id
                ]);
            }
        }catch (\Exception $exception){
            return false;
        }
        return true;
    }

    public function totalCart()
    {
        $carts = Session::get('carts');
        // total cart
        $total = 0;
        if ($carts){
            foreach ($carts as $cart){
                $total += $cart['discount'] != 0 ? ($cart['price'] - $cart['price']*($cart['discount']/100))*$cart['qty'] : $cart['price']*$cart['qty'];
            }
        }

        return $total;
    }

    public function sendOrderConfirmationMail($order)
    {
        Mail::to($order->email)->send(new OrderMail($order));
    }
}
