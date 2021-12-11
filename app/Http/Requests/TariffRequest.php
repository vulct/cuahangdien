<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TariffRequest extends FormRequest
{
    public function rules(): array
    {
        $rules = [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:200'
            ],
            'language' => 'string|nullable|max:100',
            'link_download' => 'required|max:200',
            'brand_id' => 'numeric|required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'slug' => [
                'required',
                'min:3',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'max:120',
                Rule::unique('tariffs')->where(function ($query) {
                    $query->where('isDelete', 0);
                })
            ]
        ];

        if (in_array($this->method(), ['PUT', 'PATCH', 'DELETE'])) {
            $rules['slug'] = [
                'required',
                'string',
                'max:120',
                Rule::unique('tariffs')->where(function ($query) {
                    $query->where('isDelete', 0);
                })->ignore($this->tariff->id)
            ];
        }

        return $rules;
    }

    public function authorize(): bool
    {
        return true;
    }

    public function attributes()
    {
        return [
            'name' => 'tiêu đề trang',
            'slug' => 'đường dẫn (URL)',
            'link_download' => 'đường dẫn Google Drive',
            'language' => 'ngôn ngữ',
            'brand_id' => 'thương hiệu',
            'image' => 'hình ảnh'
        ];
    }
}
