<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CommentRequest;
use App\Services\Admin\CommentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    // get list reviews product
    public function index()
    {
        return view('admin.reviews.list', [
            'title' => 'Danh sách đánh giá sản phẩm',
            'reviews' => $this->commentService->get()
        ]);
    }

    // get list comments product
    public function listCommentPost()
    {
        return view('admin.comments.list', [
            'title' => 'Danh sách bình luận bài viết',
            'comments' => $this->commentService->get(1)
        ]);
    }

    // get list comments product
    public function listContact()
    {
        return view('admin.contacts.list', [
            'title' => 'Danh sách liên hệ',
            'contacts' => $this->commentService->get(2)
        ]);
    }

    public function update(Request $request): JsonResponse
    {

        $result = $this->commentService->update($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Cập nhật trạng thái thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->commentService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công'
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }

    public function create(CommentRequest $request): string
    {
        $result = $this->commentService->create($request);

        if ($result) {
            return '<div class="spr-form-message spr-form-message-success">Cảm ơn bạn đã phản hồi!</div>';
        }
        return '<div class="spr-form-message spr-form-message-success">Gửi phản hồi không thành công!</div>';
    }

    public function rate(Request $request): JsonResponse
    {
        $result = $this->commentService->rate($request);

        $id = "";

        if (isset($request->id)) {
            $id = strip_tags((int)$request->id);
        }

        if ($result && $id !== "") {
            $rate = $this->commentService->getRateOfPost($id);

            // count star rating
            $star = [];
            $sum = 0;
            $count = 0;
            foreach ($rate as $comment) {
                if ($comment->rating) {
                    $sum += $comment->rating;
                    $count += 1;
                }
            }
            $count === 0 ? $star['avg'] = 0 : $star['avg'] = round($sum/$count,1);
            $star['count'] = $count;

            $message = "<span class='spr-badge'>
                        <span class='spr-starrating spr-badge-starrating'>
                            <i class='spr-icon spr-icon-star'></i>
                            <i class='spr-icon spr-icon-star'></i>
                            <i class='spr-icon spr-icon-star'></i>
                            <i class='spr-icon spr-icon-star'></i>
                            <i class='spr-icon spr-icon-star'></i>
                        </span>
                        <span class='spr-badge-caption'><em><b>" . $star['avg'] . "/5</b> - <em> từ <b> " . $star['count'] . "</b></em> lượt đánh giá</em></span>
                    </span>";

            return response()->json([
                'msg' => $message
            ]);
        }

        return response()->json([
            'msg' => "<span class='spr-badge'>
                        <span class='spr-starrating spr-badge-starrating'>
                            <i class='spr-icon spr-icon-star'></i>
                            <i class='spr-icon spr-icon-star'></i>
                            <i class='spr-icon spr-icon-star'></i>
                            <i class='spr-icon spr-icon-star'></i>
                            <i class='spr-icon spr-icon-star'></i>
                        </span>
                        <span class='spr-badge-caption'><em>Lỗi đánh giá</em></span>
                    </span>"
        ]);

    }

    public function contact()
    {
        return view('guest.contacts.index', [
            'title' => 'Liên hệ'
        ]);
    }

    public function sendContact(CommentRequest $request): string
    {
        $result = $this->commentService->contact($request);
        if ($result){
            return '<div class="message message-success" id="show-message"><p>Gửi liên hệ thành công, chúng tôi sẽ phản hồi trong thời gian sớm nhất.</p></div>';
        }
        return '<div class="message message-error" id="show-message"><p>Gửi liên hệ không thành công, vui lòng thử lại.</p></div>';
    }
}
