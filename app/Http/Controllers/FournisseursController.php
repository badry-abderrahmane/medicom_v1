<?php

namespace App\Http\Controllers;

use App\Fournisseur;
use Illuminate\Http\Request;
use App\Http\Requests\FournisseurRequest;
use Illuminate\Support\Facades\Response;

class FournisseursController extends Controller
{
      public function index()
      {
          $fournisseurs = Fournisseur::all();
          $fournisseurs->filter->produits;
          $fournisseurs->filter->bondecommandes;
          foreach ($fournisseurs as $fournisseur) {
            $fournisseur->produits['count'] = $fournisseur->produits->count();
          }
          return $fournisseurs;
      }

      public function store(FournisseurRequest $request)
      {
          $fournisseur = Fournisseur::create($request->toArray());
          return Response::json(['message' => 'Fournisseur bien ajouté'], 200);
      }

      public function show($id)
      {
          $fournisseur = Fournisseur::findOrfail($id);
          // $fournisseur->rendezvous;
          // $fournisseur->fournisseurs;
          return Response::json($fournisseur, 200);
      }

      public function update(FournisseurRequest $request, $id)
      {
          $fournisseur = Fournisseur::findOrfail($id);
          $fournisseur->update($request->toArray());
          return Response::json(['message' => 'Fournisseur bien mis à jour'], 200);
      }

      public function destroy($id)
      {
          Fournisseur::destroy($id);
          return Response::json(['message' => 'Fournisseur bien supprimé'], 200);
      }
}
