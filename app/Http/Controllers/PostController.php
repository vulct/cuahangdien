<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\Admin\CategoryService;
use App\Services\Admin\PostService;

class PostController extends Controller
{
    protected $postService;
    protected $categoryService;

    public function __construct(PostService $postService, CategoryService $categoryService)
    {
        $this->postService = $postService;
        $this->categoryService = $categoryService;
    }

    public function index(Post $post)
    {
        // get post
        $post_detail = $this->postService->getPostByID($post->id);
//        echo '<pre>';
//        var_dump($post_detail);
//        echo '</pre>';
//        die();
        // count star rating
        $star = [];
        $sum = 0;
        $count = 0;
        foreach ($post_detail->comments as $comment){
            if ($comment->rating){
                $sum += $comment->rating;
                $count += 1;
            }
        }
        $count === 0 ? $star['avg'] = 0 : $star['avg'] = round($sum/$count,1);
        $star['count'] = $count;

        //Related Posts
        $related = $this->postService->getRelatedPosts($post_detail->category_id, $post_detail->id);


        return view('guest.post.detail', [
            'title' => !empty($post_detail->meta_title) ? $post_detail->meta_title : $post_detail->name,
            'post' => $post_detail,
            'star' => $star,
            'categories' => $this->categoryService->get(1, 1),
            'related' => $related
        ]);
    }
}
