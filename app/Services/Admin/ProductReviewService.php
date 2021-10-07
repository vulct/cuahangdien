<?php

namespace App\Services\Admin;

use App\Models\ProductReview;
use Illuminate\Support\Facades\Session;

class ProductReviewService
{

    public function get()
    {
        return ProductReview::latest()->where('isDelete', 0)->get();
    }

    public function destroy($request)
    {
        $id = $request->input('slug');

        $comment = ProductReview::where(['id' => $id, 'isDelete' => 0])->first();

        if ($comment) {
            return ProductReview::where(['id' => $id, 'isDelete' => 0])->update(['isDelete' => 1]);
        }

        return false;
    }

    public function update($request)
    {
        try {

            $id = $request->comment;
            $status = (int)$request->status;
            $status === 0 ?  $statusUpdate = 1 : $statusUpdate = 0;

            $comment = ProductReview::where(['id' => $id, 'isDelete' => 0])->first();

            if ($comment) {
                return ProductReview::where(['id' => $id, 'isDelete' => 0])->update(['active' => $statusUpdate]);
            }

            return false;
        } catch (\Exception $exception) {
            Session::flash('error', $exception->getMessage());
            return false;
        }
    }

}
