<?php

namespace App\Http\Requests;

use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Illuminate\Foundation\Http\FormRequest;

class ReservationStepOneRequest extends FormRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => "required|string|min:10|max:10",
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
            'guest_number' => 'required|integer',
        ];
    }
}
