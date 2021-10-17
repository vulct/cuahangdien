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

}
