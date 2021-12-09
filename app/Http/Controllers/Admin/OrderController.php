<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        return view('admin.orders.list', [
            'title' => 'Danh sách đơn hàng',
            'orders' => $this->orderService->get()
        ]);
    }

    public function detail(Order $code_name)
    {
        $order_detail = $this->orderService->searchByCodeName($code_name->code_name);

        if ($order_detail){
            return view('admin.orders.detail', [
                'title' => 'Chi tiết đơn hàng #' . $order_detail->code,
                'order' => $order_detail
            ]);
        }
        return redirect()->route('admin.order.index');
    }

    public function print(Request $request)
    {
        $order_detail = $this->orderService->searchByCodeName($request->code_name);

        if ($order_detail){
            return view('admin.orders.print-order', [
                'title' => 'In đơn hàng #' . $order_detail->code,
                'order' => $order_detail
            ]);
        }
        return redirect()->route('admin.order.index');
    }

    public function showStatus(Order $code_name)
    {
        return view('admin.orders.view-status', [
            'order' => $this->orderService->searchByCodeName($code_name->code_name)
        ]);
    }

    public function updateStatus(Request $request): JsonResponse
    {

        $result = $this->orderService->update($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Cập nhật trạng thái thành công.'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Cập nhật trạng thái thất bại.'
        ]);
    }
}
