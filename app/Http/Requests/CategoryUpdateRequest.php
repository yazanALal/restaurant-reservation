<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'image',
            'description' => 'required|string',
        ];
    }
}
