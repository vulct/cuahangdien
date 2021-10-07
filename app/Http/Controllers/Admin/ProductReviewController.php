<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use App\Services\Admin\ProductReviewService;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    protected $productReviewService;

    public function __construct(ProductReviewService $productReviewService)
    {
        $this->productReviewService = $productReviewService;
    }

    public function index()
    {
        return view('admin.comments.list', [
            'title' => 'Danh sách đánh giá sản phẩm',
            'reviews' => $this->productReviewService->get()
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

    public function show(ProductReview $productReview)
    {
        //
    }

    public function edit(ProductReview $productReview)
    {
        //
    }

    public function update(Request $request)
    {

        $result = $this->productReviewService->update($request);

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
        $result = $this->productReviewService->destroy($request);

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
