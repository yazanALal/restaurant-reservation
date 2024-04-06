<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'image',
            'description' => 'required|string',
            'price' => 'required|numeric|regex:/^[0-9]+(\.[0-9]+)?$/',
            'categories' => 'array',
            'categories.*' => 'integer|exists:categories,id',
        ];
    }
}
