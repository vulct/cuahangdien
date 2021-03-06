<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InfoRequest extends FormRequest
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
                'string',
                'min:3',
                'max:200'
            ],
            'keyword' => 'string|nullable|max:255',
            'description' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hotline1' => [
                'nullable',
                'string',
                'max:12',
                'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'
            ],
            'hotline2' => ['nullable',
                'string',
                'max:12',
                'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
            ],
            'phone' => ['nullable', 'string', 'max:12', 'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'],
            'address' => 'nullable|string|max:255',
            'tax_code' => 'nullable|string|max:255',
            'business_license' => 'nullable|string|max:255',
            'map_address' => ['nullable',
                'string',
                'max:255'
            ],
            'map_iframe' => ['nullable',
                'string',
                'max:255'
            ],
            'facebook' => ['nullable',
                'string',
                'max:255'
            ],
            'zalo' => ['nullable',
                'string',
                'max:12',
                'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'
            ],
            'sale' => ['nullable',
                'string',
                'max:12',
                'regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/'
            ],
            'email' => 'nullable|max:255|string|email'
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 't??n c???a h??ng',
            'keyword' => 't??? kh??a',
            'description' => 'm?? t???',
            'logo' => 'logo',
            'icon' => 'icon',
            'hotline1' => 's??? hotline 1',
            'hotline2' => 's??? hotline 2',
            'phone' => 's??? ??i???n tho???i',
            'address' => '?????a ch???',
            'tax_code' => 'm?? s??? thu???',
            'business_license' => 'gi???p ph??p kinh doanh',
            'map_address' => '?????a ch??? google map',
            'map_iframe' => 'm?? nh??ng google map',
            'facebook' => 'facebook',
            'zalo' => 'zalo',
            'sale' => 's??? b??n h??ng',
            'email' => '?????a ch??? email',
        ];
    }
}
