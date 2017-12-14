<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;
use App\Http\Requests\ProduitRequest;
use Illuminate\Support\Facades\Response;
use App\Services\UploadService;

class ProduitsController extends Controller
{
      public function index()
      {
          $produits = Produit::all();
          $produits->filter->fournisseur;
          // $produits->filter->produits;
          return $produits;
      }

      public function store(ProduitRequest $request,UploadService $upload)
      {
          $file = $request->get('img');
          $imgs = $upload->create($file,'images/products/');
          $requestNew = $request;
          $requestNew->img = $imgs;
            Produit::forceCreate([
              'name'=> request('name'),
              'reference'=> request('reference'),
              'category_id'=> request('category_id'),
              'fournisseur_id'=> request('fournisseur_id'),
              'delaisLivraison'=> request('delaisLivraison'),
              'prixFournisseur'=> request('prixFournisseur'),
              'prixVente'=> request('prixVente'),
              'quantiteMax'=> request('quantiteMax'),
              'quantiteMin'=> request('quantiteMin'),
              'img'=> $imgs,
              'note'=> request('note'),
            ]);
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
