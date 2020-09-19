<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];


    // novas funções
    public function courses(){
        return $this->hasMany('App\Course', 'category_id');
    }
}
