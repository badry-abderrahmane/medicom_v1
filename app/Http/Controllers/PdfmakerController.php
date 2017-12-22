<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Devi;
use \PDF;

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
      // $pdf = PDF::loadView('invoice.devis', ['devi' => $devi]);
      // return $pdf->download('invoice.pdf');
      return view('invoice.devis', ['devi' => $devi]);
    }
}
