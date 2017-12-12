<?php

namespace App\Http\Controllers;

use App\Bondecommande;
use Illuminate\Http\Request;
use App\Http\Requests\BondecommandeRequest;
use Illuminate\Support\Facades\Response;

class BondecommandesController extends Controller
{
      public function index()
      {
          $bondecommandes = Bondecommande::all();
          // $bondecommandes->filter->rendezvous;
          // $bondecommandes->filter->bondecommandes;
          return $bondecommandes;
      }

      public function store(BondecommandeRequest $request)
      {
          $bondecommande = Bondecommande::create($request->toArray());
          return Response::json(['message' => 'Bon de commande bien ajouté'], 200);
      }

      public function show($id)
      {
          $bondecommande = Bondecommande::findOrfail($id);
          // $bondecommande->rendezvous;
          // $bondecommande->bondecommandes;
          return Response::json($bondecommande, 200);
      }

      public function update(BondecommandeRequest $request, $id)
      {
          $bondecommande = Bondecommande::findOrfail($id);
          $bondecommande->update($request->toArray());
          return Response::json(['message' => 'Bon de commande bien mis à jour'], 200);
      }

      public function destroy($id)
      {
          Bondecommande::destroy($id);
          return Response::json(['message' => 'Bon de commande bien supprimé'], 200);
      }
}
