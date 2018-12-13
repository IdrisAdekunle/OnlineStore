<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
protected $fillable =[

    'fname',
    'lname',
    'user_id',
    'street',
    'state',
    'city',
    'phone',
    'default'


];
public function user(){


    return $this->belongsTo(User::class);
}

    public function setDefaultAttribute($default){

        $this->attributes['default'] = (boolean)($default);

    }
}
