<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
      protected $fillable = [
        'name','reference','delaisLivraison','prixFournisseur','prixVente','quantiteMin','quantiteMax','note','img','category_id','fournisseur_id'
      ];

      public function category(){
          return $this->belongsTo('App\Category');
      }

      public function fournisseur(){
          return $this->belongsTo('App\Fournisseur');
      }

      public function commandesproduits(){
          return $this->hasMany('App\Commandeproduit');
      }

      public function devisproduits(){
          return $this->hasMany('App\Devisproduit');
      }

      public function facturesproduits(){
          return $this->hasMany('App\Facturesproduit');
      }

      public function bondecommandesproduits(){
          return $this->hasMany('App\Bondecommandesproduit');
      }
}
