<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'type' => 'required|numeric',
            'name' => 'string|required|max:200',
            'phone' => 'string|required|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
        ];
    }

    public function attributes()
    {
        return [
            'type' => 'tên bộ phận',
            'name' => 'tên nhân viên',
            'phone' => 'số điện thoại',
            'image' => 'ảnh đại diện'
        ];
    }
}
