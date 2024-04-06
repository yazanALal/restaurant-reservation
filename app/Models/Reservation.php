<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'res_date',
        'table_id',
        'guest_number',
        'uuid',
    ];

    protected $casts = [
        'first_name'=>'string',
        'last_name'=>'string',
        'email'=>'string',
        'phone'=>'string',
        'res_date'=>'datetime',
        'table_id'=>'integer',
        'guest_number'=>'integer',
        'uuid'=>'string',
    ];

    protected $dates=[
        'res_date'
    ];

    public function table(): object
    {
        return $this->belongsTo(Table::class);
    }
}
