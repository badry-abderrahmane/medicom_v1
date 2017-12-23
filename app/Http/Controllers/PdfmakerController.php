<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Devi;
use \Excel;

class PdfmakerController extends Controller
{
    public function getDevis($id)
    {
      $devi = Devi::findOrFail($id);
      $devi->devisproduits;
      $devi->prospect;
      foreach ($devi->devisproduits as $deviproduit) {
        $deviproduit->produit;
      }
      $Filename = 'devis'.$devi->created_at;
      $file = Excel::create($Filename, function($excel){
            $excel->sheet('Liste', function($sheet){
                
            });
        })->string('xls');
        \Storage::disk('google')->put($Filename.'.xls',$file);
      //return view('invoice.devis', ['devi' => $devi]);
    }
}
