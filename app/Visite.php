<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
      protected $fillable = [
        'date','sujet','type','status','note','client_id'
      ];

      public function client(){
          return $this->belongsTo('App\Client');
      }
}
