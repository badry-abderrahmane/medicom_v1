<?php

namespace App\Http\Controllers;

use App\Facture;
use App\Facturesproduit;
use Illuminate\Http\Request;
use App\Http\Requests\FactureRequest;
use Illuminate\Support\Facades\Response;

class FacturesController extends Controller
{
      public function index()
      {
          $factures = Facture::all();
          $factures->filter->client;
          $factures->filter->facturesproduits;
          foreach ($factures as $facture) {
            $facture->facturesproduits['count'] = $facture->facturesproduits->count();
          }
          return $factures;
      }

      public function store(FactureRequest $request)
      {
          $factureRequest   = $request->toArray();
          unset($factureRequest['rows']);
          $factureProduits  = $request['rows'];
          $facture = Facture::create($factureRequest);
          foreach ($factureProduits as $factureproduit)
          {
              unset($factureproduit['prix']);
              unset($factureproduit['id']);
              $factureproduit['facture_id'] = $facture->id;
              Facturesproduit::create($factureproduit);
          }
          return Response::json(['message' => 'Facture bien ajoutée'], 200);
      }

      public function show($id)
      {
        $facture = Facture::findOrfail($id);
        $facture->facturesproduits;
        foreach ($facture->facturesproduits as $factureproduit) {
          $factureproduit->produit;
        }
        $facture->client;
        // $facture->devis;
        return Response::json($facture, 200);
      }

      public function update(FactureRequest $request, $id)
      {
          $factureRequest   = $request->toArray();
          unset($factureRequest['rows']);
          $factureProduits  = $request['rows'];

          $facture = Facture::findOrfail($id);
          $facture->update($factureRequest);

          foreach ($factureProduits as $factureproduit)
          {
              unset($factureproduit['prix']);
              $factureproduit['facture_id'] = $id;
              if ($factureproduit['id']) {
                $factureProduit = Facturesproduit::findOrfail($factureproduit['id']);
                $factureProduit->update($factureproduit);
              }else{
                unset($factureproduit['id']);
                Facturesproduit::create($factureproduit);
              }
          }
          return Response::json(['message' => 'Facture bien mise à jour'], 200);
      }

      public function destroy($id)
      {
          Facture::destroy($id);
          return Response::json(['message' => 'Facture bien supprimé'], 200);
      }

      public function destroyFacturesproduit($id)
      {
          Facturesproduit::destroy($id);
          return Response::json(['message' => 'Enregistrement bien supprimé'], 200);
      }
}
