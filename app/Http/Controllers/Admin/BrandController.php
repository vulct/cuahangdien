<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Brand;
use App\Services\Admin\BrandService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.brands.list', [
            'title' => 'Danh sách thương hiệu',
            'brands' => $this->brandService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.brands.add', [
            'title' => 'Thêm mới thương hiệu'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandRequest $request
     * @return RedirectResponse
     */
    public function store(BrandRequest $request): RedirectResponse
    {
        $this->brandService->create($request);
        return redirect()->route('admin.brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Brand $brand
     * @return Application|Factory|View
     */
    public function show(Brand $brand)
    {
        return view('admin.brands.detail', [
            'brand' => $brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brand $brand
     * @return Application|Factory|View
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', [
            'title' => 'Chỉnh sửa thương hiệu',
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Brand $brand
     * @param BrandRequest $updateBrandRequest
     * @return RedirectResponse
     */
    public function update(Brand $brand, BrandRequest $updateBrandRequest): RedirectResponse
    {
        $result = $this->brandService->update($brand, $updateBrandRequest);
        if ($result) {
            return redirect()->route('admin.brands.index');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->brandService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thương hiệu thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
