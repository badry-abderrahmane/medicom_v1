<?php

namespace App\Http\Controllers;

use App\Commande;
use App\Commandesproduit;
use Illuminate\Http\Request;
use App\Http\Requests\CommandeRequest;
use Illuminate\Support\Facades\Response;

class CommandesController extends Controller
{
      public function index()
      {
          $commandes = Commande::all();
          $commandes->filter->client;
          $commandes->filter->commandesproduits;
          foreach ($commandes as $commande) {
            $commande->commandesproduits['count'] = $commande->commandesproduits->count();
          }
          return $commandes;
      }

      public function store(CommandeRequest $request)
      {
          $commandeRequest   = $request->toArray();
          unset($commandeRequest['rows']);
          $commandeProduits  = $request['rows'];
          $commande = Commande::create($commandeRequest);
          foreach ($commandeProduits as $commandeproduit)
          {
              unset($commandeproduit['prix']);
              unset($commandeproduit['id']);
              $commandeproduit['commande_id'] = $commande->id;
              Commandesproduit::create($commandeproduit);
          }

          return Response::json(['message' => 'Commande bien ajouté'], 200);
      }

      public function show($id)
      {
        $commande = Commande::findOrfail($id);
        $commande->commandesproduits;
        $commande->client;
        // $commande->devis;
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
