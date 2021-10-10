<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CommentRequest;
use App\Models\Comment;
use App\Services\Admin\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function index()
    {
        return view('admin.comments.list', [
            'title' => 'Danh sách đánh giá sản phẩm',
            'reviews' => $this->commentService->get()
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Comment $productReview)
    {
        //
    }

    public function edit(Comment $productReview)
    {
        //
    }

    public function update(Request $request)
    {

        $result = $this->commentService->update($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Cập nhật trạng thái đánh giá thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function destroy(Request $request)
    {
        $result = $this->commentService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa đánh giá thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
