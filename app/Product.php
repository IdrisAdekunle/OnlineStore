<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\CanBeBought;


class Product extends Model
{

//use CanBeBought;

    protected $fillable =[
        'name',
        'description',
        'price',
        'picture',
        'picture1',
        'picture2',
        'stock',
        'sizes',
        'colors',
        'status'

    ];


    protected $casts = ['sizes' => 'array', 'colors' => 'array'];




    public static function GenerateProductNo()
    {
        $increment_no = 1;
        $new_id = 100;
        $prefix = "PID.";
        $last_product = DB::table('products')
            ->latest('id')
            ->first();
        if ($last_product == NULL) {

            $increment = $new_id + $increment_no;
            return $prefix . $increment;

        } else {

            $new_increment = $new_id + $last_product->id + $increment_no;
            return $prefix . $new_increment;

        }


    }

    public function setStatusAttribute($status){

        $this->attributes['status'] = (boolean)($status);

    }



    public function setStockAttribute($stock){

        $this->attributes['stock'] = (boolean)($stock);

    }

    public function getRouteKeyName()
    {
        return 'name';
    }


    public function wishlists()
    {
        return $this->morphToMany(User::class, 'wishlist');
    }

    public function wishlistedBy(User $user)
    {
        return $this->wishlists->contains($user);
    }

    public  function productOrders(){

        return $this->belongsToMany(Order::class,'order_product');
    }

}
