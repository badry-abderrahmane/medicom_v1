<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Response;

class CategoriesController extends Controller
{
      public function index()
      {
          $categories = Category::all();
          $categories->filter->produits;
          foreach ($categories as $categorie) {
            $categorie->produits['count'] = $categorie->produits->count();
          }
          return $categories;
      }

      public function store(CategoryRequest $request)
      {
          $categorie = Category::create($request->toArray());
          return Response::json(['message' => 'Categorie bien ajouté'], 200);
      }

      public function show($id)
      {
          $categorie = Category::findOrfail($id);
          // $fournisseur->rendezvous;
          // $fournisseur->fournisseurs;
          return Response::json($categorie, 200);
      }

      public function update(CategoryRequest $request, $id)
      {
          $categorie = Category::findOrfail($id);
          $categorie->update($request->toArray());
          return Response::json(['message' => 'Categorie bien mis à jour'], 200);
      }

      public function destroy($id)
      {
          Category::destroy($id);
          return Response::json(['message' => 'Categorie bien supprimé'], 200);
      }
}
