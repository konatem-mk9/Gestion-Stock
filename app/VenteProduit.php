<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VenteProduit extends Model
{
    //
    protected $guarded = ['quantité']; 
    protected $table = 'vente_produits';
    

    protected $fillable = ['nom_client','order_id', 'product_id','quantité'];
}
