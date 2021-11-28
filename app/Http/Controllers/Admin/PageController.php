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
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.pages.list', [
            'title' => 'Danh sách trang nội dung',
            'pages' => $this->pageService->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.add', [
            'title' => 'Thêm mới trang nội dung',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PageRequest $request
     * @return RedirectResponse
     */
    public function store(PageRequest $request): RedirectResponse
    {
        $result = $this->pageService->create($request);
        if ($result) {
            return redirect()->route('admin.pages.index');
        }
        return back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return Application|Factory|View
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', [
            'title' => 'Chỉnh sửa trang nội dung',
            'page' => $page
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PageRequest $request
     * @param Page $page
     * @return RedirectResponse
     */
    public function update(PageRequest $request, Page $page): RedirectResponse
    {
        $result = $this->pageService->update($page, $request);
        if ($result) {
            return redirect()->route('admin.pages.index');
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

    public function detail(Page $page)
    {

    }
}
