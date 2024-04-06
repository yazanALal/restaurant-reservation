<?php

namespace App\Http\Requests;

use App\Rules\CheckGuestNumber;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Illuminate\Foundation\Http\FormRequest;
class ReservationStoreRequest extends FormRequest
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
            'phone'=>"required|string|min:10|max:10",
            'res_date'=>['required','date',new DateBetween,new TimeBetween],
            'table_id' => ['required','integer','exists:tables,id',new CheckGuestNumber($this->table_id,$this->guest_number)],
            'guest_number' => 'required|integer',
        ];
    }
}
