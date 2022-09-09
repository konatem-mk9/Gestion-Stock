<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Category extends Model

{
    protected $table='category';
    protected $fillable = ['parent_id', 'nom'];


    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    public function subcategory(){

        return $this->hasMany('App\Category', 'parent_id');

    }
}
