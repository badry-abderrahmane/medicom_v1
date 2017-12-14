<?php

namespace App\Http\Controllers;

use App\Bondecommande;
use App\Bondecommandesproduit;
use Illuminate\Http\Request;
use App\Http\Requests\BondecommandeRequest;
use Illuminate\Support\Facades\Response;

class BondecommandesController extends Controller
{
      public function index()
      {
          $bondecommandes = Bondecommande::all();
          $bondecommandes->filter->fournisseur;
          $bondecommandes->filter->bondecommandesproduits;
          foreach ($bondecommandes as $bondecommande) {
            $bondecommande->bondecommandesproduits['count'] = $bondecommande->bondecommandesproduits->count();
          }
          return $bondecommandes;
      }

      public function store(BondecommandeRequest $request)
      {
          $bondecommandeRequest   = $request->toArray();
          unset($bondecommandeRequest['rows']);
          $bondecommandeProduits  = $request['rows'];
          $bondecommande = Bondecommande::create($bondecommandeRequest);
          foreach ($bondecommandeProduits as $bondecommandeproduit)
          {
              unset($bondecommandeproduit['id']);
              $bondecommandeproduit['bondecommande_id'] = $bondecommande->id;
              Bondecommandesproduit::create($bondecommandeproduit);
          }
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
