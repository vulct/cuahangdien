<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\ProductService;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{

    protected $productService;
    protected $orderService;

    public function __construct(ProductService $productService, OrderService $orderService)
    {
        $this->productService = $productService;
        $this->orderService  = $orderService;
    }

    public function index()
    {

        // tổng số đơn hàng
        $cont_bill = $this->orderService->countBill() ?? [];

        #Status
        //0. Đang xử lý
        //1. Đang báo giá
        //2. Đã báo giá
        //3. Đang giao hàng
        //4. Đã thanh toán
        //5. Chưa thanh toán
        //6. Thành công
        //7. Huỷ

        $count_with_status = [];

        if ($cont_bill){
            foreach ($cont_bill as $bill){
                array_key_exists($bill->status, $count_with_status) ? $count_with_status[$bill->status] += 1 : $count_with_status[$bill->status] = 1 ;
            }
        }

        //tổng doanh thu
        $total_bill = $this->orderService->sumBill() ?? 0;

        // tổng số sản phẩm đang bán
        $total_product = $this->productService->getAllProductIsActive()->count() ?? 0;
        // 4 sản phẩm mới nhất
        $list_new_product = $this->productService->getListProduct(4) ?? [];
        // 10 hoá đơn gần nhất
        $list_bill = $this->orderService->getListBill(10) ?? [];

        return view('admin.home',[
            'title' => 'Dashboard',
            'count_with_status' => $count_with_status,
            'count_bill' => $cont_bill->count() ?? 0,
            'list_bill' => $list_bill,
            'total_bill' => $total_bill,
            'total_product' => $total_product,
            'list_new_product' => $list_new_product
        ]);
    }

    public function getDataChart(): JsonResponse
    {
        //doanh thu bán hàng theo tháng
        $total_by_month = $this->orderService->getTotalSaleByMonth() ?? [];

        $data = [];

        foreach ($total_by_month as $total){
            $data[$total->sale_month] = $total->total_sales;
        }
        for ($i = 1; $i <= 12; $i ++){
            if (!array_key_exists($i, $data)){
                $data[$i] = 0;
            }
        }

        return response()->json($data);
    }

}
