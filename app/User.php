<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders(){

        return $this->hasMany(Order::class);

    }



    public function WishlistProducts()
    {
        return $this->morphedByMany(Product::class, 'wishlist')
            ->withPivot(['created_at'])
            ->orderBy('pivot_created_at', 'desc');
    }

    public function address(){

        return $this->hasMany(Address::class);

    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }



}

