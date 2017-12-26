<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Devi;
use PDF;
use App\Services\PdfService;

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
      $pdf_maker = new PdfService($devi);
    }
}
