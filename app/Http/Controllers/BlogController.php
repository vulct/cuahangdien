<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\Admin\CategoryService;
use App\Services\Admin\PostService;
use function PHPUnit\Framework\isEmpty;

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
        $category = $this->categoryService->getFirstCategory();
        $selected = 0;
        if ($category) {
            $selected = $category->id;
        }
        return view('guest.blogs.list', [
            'title' => $category->name,
            'posts' => $this->postService->getPostPaginate($selected),
            'categories' => $this->categoryService->get(1, 1),
            'selected' => $category
        ]);
    }

    public function getPostWithCategory(Category $category)
    {
        $selected = 0;
        if (!empty($category->id)) {
            $selected = $category->id;
        }

        return view('guest.blogs.list', [
            'title' => $category->meta_title ?? $category->name,
            'posts' => $this->postService->getPostPaginate($selected),
            'categories' => $this->categoryService->get(1, 1),
            'selected' => $category
        ]);
    }


}
