<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
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

    public function countBill()
    {
        return Order::all();
    }

    public function sumBill()
    {
        return Order::where(['status' => 6])->sum('total');
    }

    public function getListBill($limit = 1)
    {
        return Order::latest()->limit($limit)->get();
    }

    public function getTotalSaleByMonth(): \Illuminate\Support\Collection
    {
        //SELECT  MONTH(created_at) as SalesMonth,
        //         SUM(total) AS TotalSales
        //    FROM `order` WHERE `status` = 7 AND YEAR(created_at) = 2021
        //GROUP BY YEAR(created_at), MONTH(created_at)
        $year = date('Y', strtotime(now()));
        return DB::table('order')
            ->selectRaw('MONTH(created_at) as sale_month, sum(total) as total_sales')
            ->where(['status' => 6])
            ->whereYear('created_at','=',$year)
            ->groupBy('sale_month')
            ->get();
    }

}
