<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBrandRequest extends FormRequest
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
        return [
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => [
                'required',
                'min:3',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'max:255',
                Rule::unique('brands')->where(function($query) {
                    $query->where('isDelete', 0);
                })->ignore($this->brand->id)
            ]
        ];
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
