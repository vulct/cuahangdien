<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'description' => 'string|nullable|max:300',
            'meta_title' => 'string|nullable|max:100',
            'keyword' => 'string|max:200|nullable',
            'type_name' => 'string|max:120',
            'codename' => 'string|max:120',
            'size' => 'nullable|max:120|string',
            'price' => 'integer',
            'discount' => 'integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => [
                'required',
                'min:3',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'max:255',
                Rule::unique('products')->where(function ($query) {
                    $query->where('isDelete', 0);
                })
            ],
            'warranty' => 'required|string|min:3|max:255',
            'category' => 'integer|required',
            'brand' => 'integer|required'
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['slug'] = [
                'required',
                'string',
                'max:255',
                Rule::unique('products')->where(function ($query) {
                    $query->where('isDelete', 0);
                })->ignore($this->product->id)
            ];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'name' => 'tên sản phẩm',
            'slug' => 'đường dẫn (URL)',
            'image' => 'hình ảnh',
            'warranty' => 'bảo hành',
            'unit' => 'đơn vị tính',
            'discount' => 'chiết khấu',
            'meta_title' => 'tiêu đề',
            'keyword' => 'từ khóa',
            'description' => 'mô tả',
            'category' => 'danh mục',
            'brand' => 'thương hiệu',
            'size' => 'kích thước'
        ];
    }

    public function messages()
    {
        return [
            'category.not_in' => 'Vui lòng chọn danh mục sản phẩm.',
            'brand.not_in' => 'Vui lòng chọn thương hiệu sản phẩm.'
        ];
    }
}
