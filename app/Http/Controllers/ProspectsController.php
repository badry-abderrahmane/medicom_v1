<?php

namespace App\Http\Controllers;

use App\Prospect;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ProspectRequest;
use Illuminate\Support\Facades\Response;

class ProspectsController extends Controller
{
      public function index()
      {
          $prospects = Prospect::all();
          $prospects->filter->rendezvous;
          $prospects->filter->devis;
          return $prospects;
      }

      public function store(ProspectRequest $request)
      {
          $prospect = Prospect::create($request->toArray());
          return Response::json(['message' => 'Prospect bien ajouté'], 200);
      }

      public function show($id)
      {
          $prospect = Prospect::findOrfail($id);
          $prospect->rendezvous;
          $prospect->devis;
          return Response::json($prospect, 200);
      }

      public function update(ProspectRequest $request, $id)
      {
          $prospect = Prospect::findOrfail($id);
          $prospect->update($request->toArray());
          return Response::json(['message' => 'Prospect bien mis à jour'], 200);
      }

      public function destroy($id)
      {
          Prospect::destroy($id);
          return Response::json(['message' => 'Prospect bien supprimé'], 200);
      }

      public function convertProspect($id)
      {
          $prospect = Prospect::findOrfail($id);
          $client = [];
          $client['name'] = $prospect->name;
          $client['phone'] = $prospect->phone;
          $client['activite'] = $prospect->activite;
          $client['adress'] = $prospect->adress;
          $client = Client::create($client);
          return Response::json(['message' => 'Prospect bien ajouté à la liste des clients'], 200);
      }
}
