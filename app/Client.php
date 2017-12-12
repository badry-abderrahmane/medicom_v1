<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
      protected $fillable = [
        'name', 'phone','adress','activite'
      ];

      public function commandes(){
          return $this->hasMany('App\Commande');
      }

      public function factures(){
          return $this->hasMany('App\Facture');
      }

      public function visites(){
          return $this->hasMany('App\Visite');
      }
      
}
