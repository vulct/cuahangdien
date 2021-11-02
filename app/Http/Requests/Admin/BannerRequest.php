<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'title' => [
                'string',
                'nullable',
                'min:3',
                'max:100'
            ],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
            'url' => [
                'min:3',
                'max:120',
                'nullable'
            ],
            'alt' => 'string|min:3|max:100|nullable',
            'sort' => 'numeric'
        ];

        if (in_array($this->method(), ['PUT', 'PATCH', 'DELETE'])) {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240';
        }

        return $rules;
    }

    public function attributes(): array
    {
        return [
            'title' => 'tiêu đề',
            'url' => 'đường dẫn (URL)',
            'image' => 'hình ảnh',
            'alt' => 'thông tin',
            'sort' => 'thứ tự'
        ];
    }
}
