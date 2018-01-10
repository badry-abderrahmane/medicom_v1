<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Devi;
use App\Facture;
use App\Commande;
use App\Bondecommande;

use App\Services\PdfService;
use App\Services\PdfCommandeService;
use App\Services\PdfFactureService;
use App\Services\PdfBondecommandeService;

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

    public function getFacture($id)
    {
      $facture = Facture::findOrFail($id);
      $facture->facturesproduits;
      $facture->client;
      foreach ($facture->facturesproduits as $factureproduit) {
        $factureproduit->produit;
      }
      $pdf_maker = new PdfFactureService($facture);
    }

    public function getBondelivraison($id)
    {
      $facture = Facture::findOrFail($id);
      $facture->facturesproduits;
      $facture->client;
      foreach ($facture->facturesproduits as $factureproduit) {
        $factureproduit->produit;
      }
      $pdf_maker = new PdfBondelivraisonService($facture);
    }

    public function getCommande($id)
    {
      $commande = Commande::findOrFail($id);
      $commande->commandesproduits;
      $commande->client;
      foreach ($commande->commandesproduits as $commandeproduit) {
        $commandeproduit->produit;
      }
      $pdf_maker = new PdfCommandeService($commande);
    }

    public function getBondecommande($id)
    {
      $bondecommande = Bondecommande::findOrFail($id);
      $bondecommande->bondecommandesproduits;
      $bondecommande->fournisseur;
      foreach ($bondecommande->bondecommandesproduits as $bondecommandeproduit) {
        $bondecommandeproduit->produit;
      }
      $pdf_maker = new PdfBondecommandeService($bondecommande);
    }
}
