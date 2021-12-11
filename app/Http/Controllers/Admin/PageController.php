<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Models\Page;
use App\Services\Admin\PageService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $pageService;

    public function __construct(PageService $pageServices)
    {
        $this->pageService = $pageServices;
    }

    public function index()
    {
        return view('admin.pages.list', [
            'title' => 'Danh sách trang nội dung',
            'pages' => $this->pageService->get()
        ]);
    }

    public function create()
    {
        return view('admin.pages.add', [
            'title' => 'Thêm mới trang nội dung',
        ]);
    }

    public function store(PageRequest $request): RedirectResponse
    {
        $result = $this->pageService->create($request);
        if ($result) {
            return redirect()->route('admin.pages.index');
        }
        return back();

    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', [
            'title' => 'Chỉnh sửa trang nội dung',
            'page' => $page
        ]);
    }

    public function update(PageRequest $request, Page $page): RedirectResponse
    {
        $result = $this->pageService->update($page, $request);
        if ($result) {
            return redirect()->route('admin.pages.index');
        }
        return back();
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->pageService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa trang nội dung thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function view(Page $page)
    {
        return view('guest.pages.view',[
            'title' => $page->name ?? 'Thông tin chi tiết',
            'page' => $page
        ]);
    }
}
