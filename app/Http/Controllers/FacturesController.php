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
          // $factures->filter->rendezvous;
          // $factures->filter->factures;
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
          return Response::json(['message' => 'Facture bien ajouté'], 200);
      }

      public function show($id)
      {
          $facture = Facture::findOrfail($id);
          // $facture->rendezvous;
          // $facture->factures;
          return Response::json($facture, 200);
      }

      public function update(FactureRequest $request, $id)
      {
          $facture = Facture::findOrfail($id);
          $facture->update($request->toArray());
          return Response::json(['message' => 'Facture bien mis à jour'], 200);
      }

      public function destroy($id)
      {
          Facture::destroy($id);
          return Response::json(['message' => 'Facture bien supprimé'], 200);
      }
}
