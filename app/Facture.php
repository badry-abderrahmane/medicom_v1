<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $fillable = [
      'totalHT', 'totalTTC','client_id'
    ];

    public function client(){
        return $this->belongsTo('App\Client');
    }

    public function commandesproduits(){
        return $this->hasMany('App\Commandesproduit');
    }
}
