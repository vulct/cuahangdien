<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Session;

class OrderService
{
    public function getLatest(){
        return Order::latest('created_at')->first();
    }

    public function search($code, $phone)
    {
        $format_code = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $code);

        return Order::where([
            'code' => $format_code,
            'phone' => $phone
        ])->first();
    }

    public function searchByCodeName($code_name)
    {
        return Order::with(['items' => function($query){
            $query->with(['product_attribute' => function($q){
                $q->with(['product' => function($query){
                    $query->with('brand');
                }]);
            }]);
        }, 'shipping'])->where([
            'code_name' => $code_name
        ])->first();
    }

     // order in admin

    public function get()
    {
        return Order::latest()->get();
    }

    // update status order

    public function update($request): bool
    {
        try {
            $code_name = $request->code_name;
            $status = in_array((int)$request->status, [0,1,2,3,4,5,6,7]) ? (int)$request->status : 0;
            return Order::where(['code_name' => $code_name])->update(['status' => $status]);

        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }
}
