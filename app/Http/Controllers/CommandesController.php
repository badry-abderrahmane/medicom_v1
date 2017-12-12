<?php

namespace App\Http\Controllers;

use App\Commande;
use Illuminate\Http\Request;
use App\Http\Requests\CommandeRequest;
use Illuminate\Support\Facades\Response;

class CommandesController extends Controller
{
      public function index()
      {
          $commandes = Commande::all();
          // $commandes->filter->rendezvous;
          // $commandes->filter->commandes;
          return $commandes;
      }

      public function store(CommandeRequest $request)
      {
          $commande = Commande::create($request->toArray());
          return Response::json(['message' => 'Commande bien ajouté'], 200);
      }

      public function show($id)
      {
          $commande = Commande::findOrfail($id);
          // $commande->rendezvous;
          // $commande->commandes;
          return Response::json($commande, 200);
      }

      public function update(CommandeRequest $request, $id)
      {
          $commande = Commande::findOrfail($id);
          $commande->update($request->toArray());
          return Response::json(['message' => 'Commande bien mis à jour'], 200);
      }

      public function destroy($id)
      {
          Commande::destroy($id);
          return Response::json(['message' => 'Commande bien supprimé'], 200);
      }
}
