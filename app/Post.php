<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasSlug;

    protected $fillable = [

        'image',
        'description',
        'user_name',
        'category_id',
        'title',
        'slug',
        'status'
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(50)
            ->usingSeparator('_');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tag');
    }

    public function admin(){

        return $this->belongsTo(Admin::class);

    }

    public function category(){

        return $this->belongsTo(BlogCategory::class,'category_id');

    }

    public function SetStatusAttribute($value){

        $this->attributes['status'] = (boolean)($value);

    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
