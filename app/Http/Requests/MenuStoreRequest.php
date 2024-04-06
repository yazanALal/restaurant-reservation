<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'image' => 'required|image',
            'description' => 'required|string',
            'price' => 'required|numeric|regex:/^[0-9]+(\.[0-9]+)?$/',
            'categories' => 'array',
            'categories.*' => 'integer|exists:categories,id',
            
        ];
    }
}
