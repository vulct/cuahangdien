<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:200'
            ],
            'content' => 'string|required|max:1500',
            'email' => 'required|email|string|max:200',
            'phone' => 'string|nullable|max:20',
            'rating' => 'nullable',
            'type' => 'required|numeric',
            'product_id' => 'nullable|numeric',
            'post_id' => 'nullable|numeric'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'name' => 'họ tên',
            'email' => 'email',
            'content' => 'nội dung',
            'phone' => 'số điện thoại',
            'rating' => 'đánh giá',
            'type' => 'loại bình luận',
            'product_id' => 'sản phẩm',
            'post_id' => 'bài đăng'
        ];
    }
}
