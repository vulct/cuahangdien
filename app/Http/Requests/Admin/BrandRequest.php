<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => [
                'required',
                'min:3',
                'max:255'
            ],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => [
                'required',
                'min:3',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'max:255',
                Rule::unique('brands')->where(function($query) {
                    $query->where('isDelete', 0);
                })
            ]
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['slug'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('brands')->where(function ($query) {
                    $query->where('isDelete', 0);
                })->ignore($this->brand->id)
            ];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'name' => 'tên thương hiệu',
            'slug' => 'đường dẫn (URL)',
            'image' => 'hình ảnh'
        ];
    }
}
