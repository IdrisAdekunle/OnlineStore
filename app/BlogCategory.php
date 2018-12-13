<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];



    public function posts(){

        return $this->hasMany(Post::class,'category_id');

    }
    public function getRouteKeyName()
    {
        return 'name';
    }

}
