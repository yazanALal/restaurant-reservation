<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name'=>'required|string',
            'image'=>'required|image',
            'description'=>'required|string',
        ];
    }
    
    

}
