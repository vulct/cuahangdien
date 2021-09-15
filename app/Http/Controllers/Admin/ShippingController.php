<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ShippingMethod\ShippingMethodRequest;
use App\Models\Admin\ShippingMethod;
use App\Services\Admin\ShippingService;
use Illuminate\Http\Request;

class ShippingController extends Controller
{

    protected $shippingService;

    public function __construct(ShippingService $service)
    {
        $this->shippingService = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.shipping_methods.list', [
            'title' => 'Phương Thức Vận Chuyển',
            'classify' => 'Vận Chuyển',
            'shipping_methods' => $this->shippingService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shipping_methods.add', [
            'title' => 'Thêm Mới Phương Thức Vận Chuyển',
            'classify' => 'Vận Chuyển'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ShippingMethodRequest $request)
    {
        $this->shippingService->create($request);
        return redirect()->route('admin.shipping_methods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(ShippingMethod $shippingMethod)
    {
        return view('admin.shipping_methods.detail', [
            'shipping' => $shippingMethod
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(ShippingMethod $shippingMethod)
    {
        return view('admin.shipping_methods.edit', [
            'title' => 'Chỉnh Sửa Thương Hiệu Sản Phẩm',
            'classify' => 'Thương Hiệu',
            'shipping' => $shippingMethod
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ShippingMethod $shippingMethod, ShippingMethodRequest $shippingMethodRequest)
    {
        $result = $this->shippingService->update($shippingMethod, $shippingMethodRequest);
        if ($result) {
            return redirect()->route('admin.shipping_methods.index');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
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
