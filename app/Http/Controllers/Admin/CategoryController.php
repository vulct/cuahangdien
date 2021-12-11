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

    public function index()
    {
        return view('admin.categories.list', [
            'title' => 'Danh sách danh mục',
            'categories' => $this->categoryService->get()
        ]);
    }

    public function getCategoriesOfPost ()
    {
        return view('admin.categories.list', [
            'title' => 'Danh sách danh mục bài viết',
            'categories' => $this->categoryService->get(1,1),
            'create' => route('admin.categories_post.create')
        ]);
    }

    public function create()
    {
        return view('admin.categories.add', [
            'title' => 'Thêm mới danh mục',
            'categories' => $this->categoryService->get(1)
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

    public function show(Category $category)
    {

        return view('admin.categories.detail', [
            'categories' => $this->categoryService->get(1),
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

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'title' => 'Chỉnh sửa danh mục',
            'categories' => $this->categoryService->get(1),
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
