<?php

namespace App\Services\Admin;

use App\Models\Post;
use App\Services\UploadService;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Session;

class PostService
{
    protected $upload;

    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }

    public function get()
    {
        return Post::where(['isDelete' => 0])->get();
    }

    public function getPostIsActive()
    {
        return Post::with('category')->latest('posts.updated_at')->where(['isDelete' => 0, 'active' => 1])->limit(6)->get();
    }

    public function getPostPaginate($category): LengthAwarePaginator
    {
        if ($category === 0){
            return Post::with('category')->where(['isDelete' => 0, 'active' => 1])->paginate(6);
        }
        return Post::with('category')->where(['isDelete' => 0, 'active' => 1, 'category_id' => $category])->paginate(6);
    }

    public function getPostByID($id)
    {
        return Post::with('category','comments')->where(['isDelete' => 0, 'active' => 1, 'id' => $id])->first();
    }

    public function getRelatedPosts($id, $post)
    {
        return Post::with('category')->latest('posts.updated_at')
            ->where(['isDelete' => 0, 'active' => 1, 'posts.category_id' => $id])
            ->where('id', '!=', $post)
            ->limit(2)
            ->get();
    }

    public function create($request): bool
    {
        try {

            if ($request->hasFile('image')) {
                $path_image = $this->upload->store($request->file('image'));
            } else {
                $path_image = '/storage/default/image-available.jpg';
            }

            Post::create([
                "name" => (string)$request->name,
                "meta_title" => (string)$request->meta_title,
                "description" => (string)$request->description,
                "content" => (string)$request->content,
                "image" => $path_image,
                "slug" => (string)$request->slug,
                "keyword" => (string)$request->keyword,
                "active" => (int)$request->active,
                "category_id" => (int)$request->category_id
            ]);

            Session::flash('success', 'Tạo bài viết thành công.');
        } catch (Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request): bool
    {
        $slug = $request->input('slug');

        $post = Post::where('slug', $slug)->first();

        if ($post) {
            return Post::where('slug', $slug)->update(['isDelete' => 1]);
        }

        return false;
    }

    public function update($post, $request): bool
    {
        try {

            if ($request->hasFile('image')) {
                $post->image = $this->upload->store($request->file('image'));
            }

            $post->name = (string)$request->name;
            $post->meta_title = (string)$request->meta_title;
            $post->description = (string)$request->description;
            $post->content = (string)$request->content;
            $post->slug = (string)$request->slug;
            $post->keyword = (string)$request->keyword;
            $post->active = (int)$request->active;
            $post->category_id = (int)$request->category_id;
            $post->save();

            Session::flash('success', 'Cập nhật danh mục thành công.');
            return true;
        } catch (Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }



}
