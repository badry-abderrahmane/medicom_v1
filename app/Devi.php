<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devi extends Model
{
      protected $fillable = [
        'totalHT', 'totalTTC','prospect_id','status'
      ];

      public function prospect(){
          return $this->belongsTo('App\Prospect');
      }

      public function devisproduits(){
          return $this->hasMany('App\Devisproduit');
      }
}
