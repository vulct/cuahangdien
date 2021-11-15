<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\CommentRequest;
use App\Services\Admin\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function create(CommentRequest $request): string
    {
        $result = $this->commentService->create($request);
        if ($result) {
            return '<div class="spr-form-message spr-form-message-success">Cảm ơn bạn đã phản hồi!</div>';
        }
        return '<div class="spr-form-message spr-form-message-success">Gửi phản hồi không thành công!</div>';
    }

    public function rate(Request $request)
    {
        $result = $this->commentService->rate($request);
        $id = strip_tags((int)$request->id);

        if ($result) {
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
            'msg' => 'false'
        ]);

    }
}
