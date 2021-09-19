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
                'max:255'
            ],
            'type_name' => 'string',
            'codename' => 'string',
            'price' => 'integer',
            'discount' => 'integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'unit' => 'string|min:1|max:255',
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
            'discount' => 'chiết khấu'
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
