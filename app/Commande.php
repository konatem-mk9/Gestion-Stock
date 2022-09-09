<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    //

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantité');
    }
}
