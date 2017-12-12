<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendezvou extends Model
{
      protected $fillable = [
        'date','sujet','type','status','note','prospect_id'
      ];

      public function prospect(){
          return $this->belongsTo('App\Prospect');
      }
    
}
