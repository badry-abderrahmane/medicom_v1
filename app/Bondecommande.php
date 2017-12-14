<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bondecommande extends Model
{
      protected $fillable = [
        'fournisseur_id','status'
      ];

      public function fournisseur(){
          return $this->belongsTo('App\Fournisseur');
      }

      public function bondecommandesproduits(){
          return $this->hasMany('App\Bondecommandesproduit');
      }
}
