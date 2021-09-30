<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShippingMethodRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                'max:200'
            ],
            'description' => 'string|nullable|max:300',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'tên phương thức vận chuyển',
            'description' => 'mô tả'
        ];
    }
}
