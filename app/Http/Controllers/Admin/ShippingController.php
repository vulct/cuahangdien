<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ShippingMethodRequest;
use App\Models\ShippingMethod;
use App\Services\Admin\ShippingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShippingController extends Controller
{

    protected $shippingService;

    public function __construct(ShippingService $service)
    {
        $this->shippingService = $service;
    }


    public function index()
    {
        return view('admin.shipping_methods.list', [
            'title' => 'Danh sách phương thức vận chuyển',
            'shipping_methods' => $this->shippingService->get()
        ]);
    }

    public function create()
    {
        return view('admin.shipping_methods.add', [
            'title' => 'Thêm mới phương thức vận chuyển',
        ]);
    }

    public function store(ShippingMethodRequest $request): RedirectResponse
    {
        $this->shippingService->create($request);
        return redirect()->route('admin.shipping_methods.index');
    }

    public function show(ShippingMethod $shippingMethod)
    {
        return view('admin.shipping_methods.detail', [
            'shipping' => $shippingMethod
        ]);
    }

    public function edit(ShippingMethod $shippingMethod)
    {
        return view('admin.shipping_methods.edit', [
            'title' => 'Chỉnh sửa phương thức vận chuyển',
            'shipping' => $shippingMethod
        ]);
    }

    public function update(ShippingMethod $shippingMethod, ShippingMethodRequest $shippingMethodRequest): RedirectResponse
    {
        $result = $this->shippingService->update($shippingMethod, $shippingMethodRequest);
        if ($result) {
            return redirect()->route('admin.shipping_methods.index');
        }
        return back();
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->shippingService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa phương thức vận chuyển thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
