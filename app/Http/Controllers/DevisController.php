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
          $devis = Devi::all();
          // $devis->filter->rendezvous;
          // $devis->filter->devis;
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
          // return Response::json(['message' => 'Devi bien ajouté'], 200);
      }

      public function show($id)
      {
          $devi = Devi::findOrfail($id);
          // $devi->rendezvous;
          // $devi->devis;
          return Response::json($devi, 200);
      }

      public function update(DeviRequest $request, $id)
      {
          // $devi = Devi::findOrfail($id);
          // $devi->update($request->toArray());
          // return Response::json(['message' => 'Devi bien mis à jour'], 200);
      }

      public function destroy($id)
      {
          Devi::destroy($id);
          return Response::json(['message' => 'Devi bien supprimé'], 200);
      }
}
