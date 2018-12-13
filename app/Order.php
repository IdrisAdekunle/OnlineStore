<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $fillable = ['total','delivered','delivery_type','payment_type','processing','order_no'];

    public function OrderItems(){

        return $this->belongsToMany(Product::class)->withPivot('qty','total')->withTimestamps();

    }

    public function guest() {

        return $this->belongsTo(Guest::class);

    }

    public function user() {

        return $this->belongsTo(User::class);

    }




    public static function GenerateOrderNo()
    {
        $increment_no = 1;
        $new_id = 1000000;
        $prefix = "ORD.";
        $last_order = DB::table('orders')
            ->latest('id')
            ->first();
        if ($last_order == NULL) {

            $increment = $new_id + $increment_no;
            return $prefix . $increment;

        } else {

            $new_increment = $new_id + $last_order->id + $increment_no;
            return $prefix . $new_increment;

        }

    }

    public function getRouteKeyName()
    {
        return 'order_no';
    }





    }
