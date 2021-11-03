<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use App\Models\Banner;
use App\Services\BannerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    protected $bannerService;

    public function __construct(BannerService $bannerService)
    {
        $this->bannerService = $bannerService;
    }

    public function index()
    {
        return view('admin.banners.list', [
            'title' => 'Danh sách banner',
            'banners' => $this->bannerService->get()
        ]);
    }

    public function create()
    {
        return view('admin.banners.add', [
            'title' => 'Thêm mới banner'
        ]);
    }

    public function store(BannerRequest $request): RedirectResponse
    {
        $result = $this->bannerService->create($request);
        if ($result) {
            return redirect()->route('admin.banners.index');
        }
        return back();

    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', [
            'title' => 'Chỉnh sửa banner',
            'banner' => $banner
        ]);
    }

    public function update(Banner $banner, BannerRequest $bannerRequest): RedirectResponse
    {
        $result = $this->bannerService->update($banner, $bannerRequest);
        if ($result) {
            return redirect()->route('admin.banners.index');
        }
        return back();
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->bannerService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa banner thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
