<?php

namespace App\Http\Controllers;

use App\Visite;
use Illuminate\Http\Request;
use App\Http\Requests\VisiteRequest;
use Illuminate\Support\Facades\Response;

class VisitesController extends Controller
{
      public function index()
      {
          $visites = Visite::all();
          $visites->filter->client;
          // $visites->filter->visites;
          return $visites;
      }

      public function store(VisiteRequest $request)
      {
          $visite = Visite::create($request->toArray());
          return Response::json(['message' => 'Visite bien ajoutée'], 200);
      }

      public function show($id)
      {
          $visite = Visite::findOrfail($id);
          // $visite->visites;
          // $visite->visites;
          return Response::json($visite, 200);
      }

      public function update(VisiteRequest $request, $id)
      {
          $visite = Visite::findOrfail($id);
          $visite->update($request->toArray());
          return Response::json(['message' => 'Visite bien mise à jour'], 200);
      }

      public function destroy($id)
      {
          Visite::destroy($id);
          return Response::json(['message' => 'Visite bien supprimée'], 200);
      }
}
