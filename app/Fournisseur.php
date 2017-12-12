<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = [
      'name', 'phone','adress','specialite'
    ];

    public function produits(){
        return $this->hasMany('App\Produit');
    }

    public function bondecommandes(){
        return $this->hasMany('App\Bondecommande');
    }
}
