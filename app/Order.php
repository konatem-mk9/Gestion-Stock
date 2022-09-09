<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{ 
    protected $fillable = [
        'initiateur','client_id', 'nom_client', 'téléphone', 'quantité', 'total',
        'payé', 'restant', 'error', 
    ];

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
