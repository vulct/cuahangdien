<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\CreateBrandRequest;
use App\Http\Requests\Admin\Brand\UpdateBrandRequest;
use App\Models\Brand;
use App\Services\Admin\BrandService;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brands.list', [
            'title' => 'Thương Hiệu Sản Phẩm',
            'classify' => 'Thương Hiệu',
            'brands' => $this->brandService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.add', [
            'title' => 'Thêm Mới Thương Hiệu Sản Phẩm',
            'classify' => 'Thương Hiệu'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateBrandRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->brandService->create($request);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
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
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', [
            'title' => 'Chỉnh Sửa Thương Hiệu Sản Phẩm',
            'classify' => 'Thương Hiệu',
            'brand' => $brand
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Brand $brand, UpdateBrandRequest $updateBrandRequest)
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
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
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
