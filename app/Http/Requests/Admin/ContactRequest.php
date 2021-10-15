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
            'group' => [
                'required',
                'string',
                'min:3',
                'max:200'
            ],
            'name' => 'string|required|max:200',
            'phone' => 'required|string|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'group' => 'tên bộ phận',
            'name' => 'tên nhân viên',
            'phone' => 'số điện thoại',
        ];
    }
}
