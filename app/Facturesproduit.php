<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturesproduit extends Model
{
      protected $fillable = [
        'produit_id', 'quantite','prixHT','totalHT','facture_id'
      ];

      public function produit()
      {
        return $this->belongsTo('App\Produit');
      }
}
