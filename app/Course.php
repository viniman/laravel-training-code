<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
        'img_link',
        'video',
        'category_id'
    ];



    // novas funções
    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function users(){
        return $this->belongsToMany('App\User', 'course_user', 'course_id', 'user_id' );
    }
}
