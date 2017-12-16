<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commandesproduit extends Model
{
      protected $fillable = [
        'produit_id', 'quantite','prixHT','totalHT','commande_id'
      ];

      public function produit()
      {
        return $this->belongsTo('App\Produit');
      }
}
