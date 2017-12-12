<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use Illuminate\Support\Facades\Response;

class ClientsController extends Controller
{
      public function index()
      {
          $clients = Client::all();
          $clients->filter->rendezvous;
          $clients->filter->visites;
          $clients->filter->devis;
          $clients->filter->factures;
          return $clients;
      }

      public function store(ClientRequest $request)
      {
          $client = Client::create($request->toArray());
          return Response::json(['message' => 'Client bien ajouté'], 200);
      }

      public function show($id)
      {
          $client = Client::findOrfail($id);
          $client->rendezvous;
          $client->visites;
          $client->devis;
          $client->factures;
          return Response::json($client, 200);
      }

      public function update(ClientRequest $request, $id)
      {
          $client = Client::findOrfail($id);
          $client->update($request->toArray());
          return Response::json(['message' => 'Client bien mis à jour'], 200);
      }

      public function destroy($id)
      {
          Client::destroy($id);
          return Response::json(['message' => 'Client bien supprimé'], 200);
      }
}
