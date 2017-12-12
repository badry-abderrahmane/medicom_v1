<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prospect extends Model
{
      protected $fillable = [
        'name', 'phone','adress','activite'
      ];

      public function rendezvous(){
          return $this->hasMany('App\Rendezvou');
      }

      public function devis(){
          return $this->hasMany('App\Devi');
      }

}
