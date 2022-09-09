<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommandeProduit extends Model
{
    //
    protected $guarded = ['quantité']; 
    protected $table = 'commande_produit';
    

    protected $fillable = ['nom_client','order_id', 'product_id','quantité'];
}
