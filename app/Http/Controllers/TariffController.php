<?php

namespace App\Http\Controllers;

use App\Http\Requests\TariffRequest;
use App\Models\Tariff;
use App\Services\Admin\CategoryService;
use App\Services\TariffService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TariffController extends Controller
{
    protected $tariffService;
    protected $categoryService;

    public function __construct(TariffService $tariffService, CategoryService $categoryService)
    {
        $this->tariffService = $tariffService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return view('admin.tariff.list', [
            'title' => 'Danh sách bảng giá',
            'tariffs' => $this->tariffService->get()
        ]);
    }

    public function create()
    {
        return view('admin.tariff.add', [
            'title' => 'Thêm mới bảng giá',
            'categories' => $this->categoryService->get(1,0)
        ]);
    }

    public function store(TariffRequest $request): RedirectResponse
    {
        $this->tariffService->create($request);
        return redirect()->route('admin.posts.index');
    }

    public function edit(Tariff $tariff)
    {
        return view('admin.tariff.edit', [
            'title' => 'Chỉnh sửa bảng giá',
            'categories' => $this->categoryService->get(1,0),
            'tariff' => $tariff
        ]);
    }

    public function update(TariffRequest $request, Tariff $tariff): RedirectResponse
    {
        $result = $this->tariffService->update($tariff, $request);

        if ($result) {
            return redirect()->route('admin.tariffs.index');
        }
        return back();
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->tariffService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa bài viết thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
