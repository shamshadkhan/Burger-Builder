<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Burger extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ingredients', 'price', 'customer', 'user_id'
    ];

    protected $casts = [
        'ingredients' => 'json',
        'customer' => 'json',
    ];
}
