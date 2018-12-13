<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'fname',
        'lname',
        'street',
        'state',
        'city',
        'phone',

    ];


    public function order(){

        return $this->hasOne(Order::class);

    }
}
