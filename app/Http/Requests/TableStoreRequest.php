<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableStoreRequest extends FormRequest
{


    public function rules()
    {
        return [
            'name' => 'required|string',
            'guest_number' => 'required|integer',
            'status' => 'required|string|in:available,unavailable,pending',
            'location' => 'required|string|in:outside,inside,front',
        ];
    }
}
