<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bondecommandesproduit extends Model
{
      protected $fillable = [
        'produit_id','bondecommande_id','quantite'
      ];

      public function produit()
      {
        return $this->belongsTo('App\Produit');
      }
}
