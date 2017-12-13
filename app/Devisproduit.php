<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Devisproduit extends Model
{
      protected $fillable = [
        'produit_id', 'quantite','prixHT','totalHT','devi_id'
      ];


}
