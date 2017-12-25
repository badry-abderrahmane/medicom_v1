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
    // public function getDevis($id)
    // {
    //   $devi = Devi::findOrFail($id);
    //   $devi->devisproduits;
    //   $devi->prospect;
    //   foreach ($devi->devisproduits as $deviproduit) {
    //     $deviproduit->produit;
    //   }
    //   $Filename = 'devis'.$devi->created_at;
    //
    //   $view = \View::make('invoice.devis', ['devi' => $devi]);
    //   $html_cont = $view->render();
    //
    //   PDF::setTitle('Sample axer');
    //   PDF::AddPage();
    //   PDF::writeHTML($html_cont, true, false, true, false, '');
    //   PDF::Output('_sepml.pdf');
    //   // $file = Excel::create($Filename, function($excel){
    //   //       $excel->sheet('Liste', function($sheet){
    //   //
    //   //       });
    //   //   })->string('xls');
    //
    //   //   \Storage::disk('google')->put($Filename.'.xls',$file);
    //   //return view('invoice.devis', ['devi' => $devi]);
    // }
}
