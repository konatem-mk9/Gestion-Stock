<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $guarded = ['stock_initial']; 
    
    public function categorie()
      {
          return $this->belongsTo('App\Category');
      }

      public function fournisseur()
    {
        return $this->belongsTo('App\Fournisseur');
    }

    public function presentPrice(){

        // return money_format('$%i', $this->price/100);
        return $this->asDollars($this->price);
    }

     private function asDollars($value) {
        if ($value<0) return "-".asDollars(-$value);
        return  number_format($value, 2, ',', ' ') . ' f' ;
      }

    public function scopeMightAlsoLike($query)
      {
          return $query->inRandomOrder()->take(4);
      }

      public function getPrice()
    {

      return $this->asDollars($this->prix_unitaire);
      
    }
}
