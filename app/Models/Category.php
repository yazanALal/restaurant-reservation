<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'uuid',
        'description',
        'image',
    ];

    protected $casts=[
        'name'=>'string',
        'uuid'=>'string',
        'description'=>'string',
        'image'=>'string',
    ];

    public function menus(): object{
        return $this->belongsToMany(Menu::class,'category_menu');
    }
}
