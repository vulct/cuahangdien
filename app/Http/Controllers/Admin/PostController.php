<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostRequest;
use App\Models\Post;
use App\Services\Admin\CategoryService;
use App\Services\Admin\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $postService;
    protected $categoryService;

    public function __construct(PostService $postService, CategoryService $categoryService)
    {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return view('admin.posts.list', [
            'title' => 'Danh sách tin tức',
            'posts' => $this->postService->get()
        ]);
    }

    public function create()
    {
        return view('admin.posts.add', [
            'title' => 'Thêm mới bài viết',
            'categories' => $this->categoryService->get(1,1)
        ]);
    }

    public function store(PostRequest $request): RedirectResponse
    {
        $this->postService->create($request);
        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'title' => 'Chỉnh sửa bài viết',
            'categories' => $this->categoryService->get(1,1),
            'post' => $post
        ]);
    }


    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $result = $this->postService->update($post, $request);

        if ($result) {
            return redirect()->route('admin.posts.index');
        }
        return back();
    }


    public function destroy(Request $request): JsonResponse
    {
        $result = $this->postService->destroy($request);

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
