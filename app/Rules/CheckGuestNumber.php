<?php

namespace App\Rules;

use App\Models\Table;
use Illuminate\Contracts\Validation\Rule;

class CheckGuestNumber implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $table_id,$guestNumber;
    public function __construct($table_id,$guestNumber)
    {
        $this->table_id = $table_id;
        $this->guestNumber = $guestNumber;
    }


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $table=Table::find($this->table_id);
        $tableGuestNumber=$table->guest_number;
        return $tableGuestNumber >= $this->guestNumber ? true : false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'please select table with the right guest number';
    }
}
