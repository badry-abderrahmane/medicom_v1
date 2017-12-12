<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;
use App\Http\Requests\ProduitRequest;
use Illuminate\Support\Facades\Response;

class ProduitsController extends Controller
{
      public function index()
      {
          $produits = Produit::all();
          // $produits->filter->rendezvous;
          // $produits->filter->produits;
          return $produits;
      }

      public function store(ProduitRequest $request)
      {
          $produit = Produit::create($request->toArray());
          return Response::json(['message' => 'Produit bien ajouté'], 200);
      }

      public function show($id)
      {
          $produit = Produit::findOrfail($id);
          // $produit->rendezvous;
          // $produit->produits;
          return Response::json($produit, 200);
      }

      public function update(ProduitRequest $request, $id)
      {
          $produit = Produit::findOrfail($id);
          $produit->update($request->toArray());
          return Response::json(['message' => 'Produit bien mis à jour'], 200);
      }

      public function destroy($id)
      {
          Produit::destroy($id);
          return Response::json(['message' => 'Produit bien supprimé'], 200);
      }
}
