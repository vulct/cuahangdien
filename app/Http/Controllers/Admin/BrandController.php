<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Brand;
use App\Services\Admin\BrandService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index()
    {
        return view('admin.brands.list', [
            'title' => 'Danh sách thương hiệu',
            'brands' => $this->brandService->get()
        ]);
    }

    public function create()
    {
        return view('admin.brands.add', [
            'title' => 'Thêm mới thương hiệu'
        ]);
    }

    public function store(BrandRequest $request): RedirectResponse
    {
        $this->brandService->create($request);
        return redirect()->route('admin.brands.index');
    }

    public function show(Brand $brand)
    {
        return view('admin.brands.detail', [
            'brand' => $brand
        ]);
    }

    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', [
            'title' => 'Chỉnh sửa thương hiệu',
            'brand' => $brand
        ]);
    }

    public function update(Brand $brand, BrandRequest $updateBrandRequest): RedirectResponse
    {
        $result = $this->brandService->update($brand, $updateBrandRequest);
        if ($result) {
            return redirect()->route('admin.brands.index');
        }
        return back();
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->brandService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thương hiệu thành công'
            ]);
        }
        if ($result === 0) {
            return response()->json([
                'error' => true,
                'message' => 'Vui lòng không xóa thương hiệu khi đang tồn tại sản phẩm thuộc thương hiệu này.'
            ]);
        }
        return response()->json([
            'error' => true
        ]);
    }
}
