<?php

namespace App\Models;

use App\Enums\TableLocation;
use App\Enums\TableStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'uuid',
        'status',
        'guest_number',
        'location'
    ];

    protected $casts = [
        'name' => 'string',
        'uuid' => 'string',
        'status'=>TableStatus::class,
        'guest_number'=>'integer',
        'location'=>TableLocation::class,
    ];  

    public function reservations():object{
        return $this->hasMany(Reservation::class);
    }

}
