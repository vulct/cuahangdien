<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Services\Admin\CategoryService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.categories.list', [
            'title' => 'Danh sách danh mục',
            'categories' => $this->categoryService->get()
        ]);
    }

    /**
     * Get category of posts
     */

    public function getCategoriesOfPost ()
    {
        return view('admin.categories.list', [
            'title' => 'Danh sách danh mục bài viết',
            'categories' => $this->categoryService->get(1,1),
            'create' => route('admin.categories_post.create')
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.categories.add', [
            'title' => 'Thêm mới danh mục',
            'categories' => $this->categoryService->get(1,0)
        ]);
    }

    public function createCategoriesOfPost()
    {
        return view('admin.categories.add', [
            'title' => 'Thêm mới danh mục bài viết',
            'categories' => $this->categoryService->get(1,1),
            'type' => 1
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        $this->categoryService->create($request);
        return redirect()->route('admin.categories.index');
    }

    public function storeCategoriesOfPost(CategoryRequest $request): RedirectResponse
    {

        $this->categoryService->create($request);
        return redirect()->route('admin.categories_post');
    }

    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function show(Category $category)
    {

        return view('admin.categories.detail', [
            'categories' => $this->categoryService->get(1,0),
            'cate' => $category
        ]);
    }

    public function showCategoriesOfPost(Category $category)
    {

        return view('admin.categories.detail', [
            'categories' => $this->categoryService->get(1,1),
            'cate' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Application|Factory|View
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'title' => 'Chỉnh sửa danh mục',
            'categories' => $this->categoryService->get(1,0),
            'cate' => $category
        ]);
    }

    public function editCategoriesOfPost(Category $category)
    {
        return view('admin.categories.edit', [
            'title' => 'Chỉnh sửa danh mục bài viết',
            'categories' => $this->categoryService->get(1,1),
            'cate' => $category,
            'type' => 1
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Category $category
     * @param CategoryRequest $updateCategoryRequest
     * @return RedirectResponse
     */
    public function update(Category $category, CategoryRequest $updateCategoryRequest): RedirectResponse
    {
        $result = $this->categoryService->update($category, $updateCategoryRequest);
        if ($result) {
            return redirect()->route('admin.categories.index');
        }
        return back();
    }

    public function updateCategoriesOfPost(Category $category, CategoryRequest $updateCategoryRequest): RedirectResponse
    {
        $result = $this->categoryService->update($category, $updateCategoryRequest);
        if ($result) {
            return redirect()->route('admin.categories_post');
        }
        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param CategoryRequest $request
     * @return JsonResponse
     */
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->categoryService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa danh mục thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
