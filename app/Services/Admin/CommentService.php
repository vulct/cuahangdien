<?php

namespace App\Services\Admin;

use App\Models\Comment;
use Illuminate\Support\Facades\Session;

class CommentService
{

    public function get($type = 0)
    {
        return Comment::latest()->where(['isDelete' => 0, 'type' => $type])->get();
    }

    public function destroy($request)
    {
        $id = $request->input('slug');

        $comment = Comment::where(['id' => $id, 'isDelete' => 0])->first();

        if ($comment) {
            return Comment::where(['id' => $id, 'isDelete' => 0])->update(['isDelete' => 1]);
        }

        return false;
    }

    public function update($request)
    {
        try {

            $id = $request->comment;
            $status = (int)$request->status;
            $status === 0 ?  $statusUpdate = 1 : $statusUpdate = 0;

            $comment = Comment::where(['id' => $id, 'isDelete' => 0])->first();

            if ($comment) {
                return Comment::where(['id' => $id, 'isDelete' => 0])->update(['active' => $statusUpdate]);
            }

            return false;
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }

    public function create($request): bool
    {
        try {
            // Check type comment
            $type = in_array((int)$request->type, [0, 1, 2]) ? (int)$request->type : 0;
            //rating=5&type=1&post_id=2&name=123&email=leminh.123@gmail.com&content=123
            //strip_tags
            Comment::create([
                "name" => strip_tags((string)$request->name),
                "email" => (string)$request->email,
                "content" => strip_tags((string)$request->slug),
                "post_id" => strip_tags((int)$request->post_id),
                "rating" => strip_tags((int)$request->rating),
                "type" => $type
            ]);
        } catch (\Exception $exception) {
            return false;
        }
        return true;
    }

    public function rate($request): bool
    {
        try {
            $id = strip_tags((int)$request->id);

            Comment::create([
                "post_id" => $id,
                "rating" => strip_tags((int)$request->rate),
                "type" => 1
            ]);

        } catch (\Exception $exception) {
            return false;
        }
        return true;
    }

    public function getRateOfPost($id)
    {
        return Comment::where(['isDelete' => 0, 'active' => 1, 'post_id' => $id])->get();
    }

}
