<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PageRequest extends FormRequest
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
            'keyword' => 'string|max:200|nullable',
            'description' => 'string|nullable',
            'content' => 'required',
            'slug' => [
                'required',
                'min:3',
                'regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/',
                'max:120',
                Rule::unique('pages')->where(function ($query) {
                    $query->where('isDelete', 0);
                })
            ]
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            $rules['slug'] = [
                'required',
                'string',
                'max:120',
                Rule::unique('pages')->where(function ($query) {
                    $query->where('isDelete', 0);
                })->ignore($this->page->id)
            ];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'name' => 'tiêu đề trang',
            'slug' => 'đường dẫn (URL)',
            'content' => 'nội dung',
            'keyword' => 'từ khóa',
            'description' => 'mô tả',
        ];
    }
}
