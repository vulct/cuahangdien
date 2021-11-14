<?php

namespace App\Http\Controllers;

use App\Services\Admin\CategoryService;
use App\Services\Admin\PostService;

class BlogController extends Controller
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
        return view('guest.blogs.list', [
            'title' => 'Danh sách tin tức',
            'posts' => $this->postService->getPostIsActive()
        ]);
    }
}
