<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:3',
                'max:200'
            ],
            'content' => 'string|nullable',

        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
