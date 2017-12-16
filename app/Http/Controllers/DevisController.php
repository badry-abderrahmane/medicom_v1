<?php

namespace App\Http\Controllers;

use App\Devi;
use App\Devisproduit;
use Illuminate\Http\Request;
use App\Http\Requests\DeviRequest;
use Illuminate\Support\Facades\Response;

class DevisController extends Controller
{
      public function index()
      {
          $devis = Devi::with('devisproduits')->get();
          $devis->filter->prospect;
          $devis->filter->devisproduits;
          foreach ($devis as $devi) {
            $devi->devisproduits['count'] = $devi->devisproduits->count();
          }
          return $devis;
      }

      public function store(DeviRequest $request)
      {
          $deviRequest   = $request->toArray();
          unset($deviRequest['rows']);
          $deviProduits  = $request['rows'];
          $devi = Devi::create($deviRequest);
          foreach ($deviProduits as $deviproduit)
          {
              unset($deviproduit['prix']);
              unset($deviproduit['id']);
              $deviproduit['devi_id'] = $devi->id;
              Devisproduit::create($deviproduit);
          }
          return Response::json(['message' => 'Devi bien ajouté'], 200);
      }

      public function show($id)
      {
          $devi = Devi::findOrfail($id);
          $devi->devisproduits;
          foreach ($devi->devisproduits as $deviproduit) {
            $deviproduit->produit;
          }
          $devi->prospect;
          // $devi->devis;
          return Response::json($devi, 200);
      }

      public function update(DeviRequest $request, $id)
      {
          $deviRequest   = $request->toArray();
          unset($deviRequest['rows']);
          $deviProduits  = $request['rows'];

          $devi = Devi::findOrfail($id);
          $devi->update($deviRequest);

          foreach ($deviProduits as $deviproduit)
          {
              unset($deviproduit['prix']);
              $deviproduit['devi_id'] = $id;
              if ($deviproduit['id']) {
                $deviProduit = Devisproduit::findOrfail($deviproduit['id']);
                $deviProduit->update($deviproduit);
              }else{
                unset($deviproduit['id']);
                Devisproduit::create($deviproduit);
              }
          }
          return Response::json(['message' => 'Devi bien mis à jour'], 200);
      }

      public function destroy($id)
      {
          Devi::destroy($id);
          return Response::json(['message' => 'Devi bien supprimé'], 200);
      }

      public function destroyDevisproduit($id)
      {
          Devisproduit::destroy($id);
          return Response::json(['message' => 'Enregistrement bien supprimé'], 200);
      }
}
