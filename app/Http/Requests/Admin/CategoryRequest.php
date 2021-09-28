<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
                'string',
                'min:3',
                'max:200'
            ],
            'meta_title' => 'string|nullable|max:100',
            'keyword' => 'string|max:200|nullable',
            'icon' => 'string|max:200|nullable',
            'description' => 'string|nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => [
                'required',
                'min:3',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'max:120',
                Rule::unique('categories')->where(function($query) {
                    $query->where('isDelete', 0);
                })
            ]
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['slug'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('pages')->where(function ($query) {
                    $query->where('isDelete', 0);
                })->ignore($this->category->id)
            ];
        }

        return  $rules;
    }

    public function attributes()
    {
        return [
            'name' => 'tên thương hiệu',
            'slug' => 'đường dẫn (URL)',
            'image' => 'hình ảnh',
            'meta_title' => 'tiêu đề',
            'keyword' => 'từ khóa',
            'description' => 'mô tả',
            'cate_parent' => 'danh mục cha',
            'active' => 'trạng thái',
            'top' => 'hiển thị',
        ];
    }
}
