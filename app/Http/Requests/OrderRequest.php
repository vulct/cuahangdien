<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:200'
            ],
            'email' => 'required|email|max:120',
            'phone' => 'required|max:12|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
            'city' => 'numeric|required',
            'province' => 'required|numeric',
            'address' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'shipping_status' => 'required|numeric|max:10',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'họ tên',
            'email' => 'email',
            'phone' => 'số điện thoại',
            'city' => 'tỉnh/thành phố',
            'province' => 'quận huyện',
            'address' => 'địa chỉ',
            'description' => 'ghi chú',
            'shipping_status' => 'phương thức thanh toán',
        ];
    }
}
