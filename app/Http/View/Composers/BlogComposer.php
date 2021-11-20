<?php

namespace App\Http\View\Composers;

use App\Services\Admin\PostService;
use Illuminate\View\View;

class BlogComposer
{
    protected $posts = [];

    public function __construct(PostService $commentService)
    {
        $this->posts = $commentService->getPostIsActive();
    }

    public function compose(View $view)
    {
        $postsArr = $this->posts;

        $data = [];
        $data['rowOne'] = [];
        $data['rowTwo'] = [];
        foreach ($postsArr as $key => $post){
            if ($key < 3){
                $data['rowOne'][] = $post;
            }else{
                $data['rowTwo'][] = $post;
            }
        }

        $view->with('posts', $data);
    }
}
