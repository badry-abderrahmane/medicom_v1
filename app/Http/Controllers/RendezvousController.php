<?php

namespace App\Http\Controllers;

use App\Rendezvou;
use Illuminate\Http\Request;
use App\Http\Requests\RendezvouRequest;
use Illuminate\Support\Facades\Response;

class RendezvousController extends Controller
{
      public function index()
      {
          $rendezvous = Rendezvou::all();
          $rendezvous->filter->prospect;
          // $rendezvous->filter->rendezvous;
          return $rendezvous;
      }

      public function store(RendezvouRequest $request)
      {
          $rendezvou = Rendezvou::create($request->toArray());
          return Response::json(['message' => 'Rendez-vous bien ajouté'], 200);
      }

      public function show($id)
      {
          $rendezvou = Rendezvou::findOrfail($id);
          // $rendezvou->rendezvous;
          // $rendezvou->rendezvous;
          return Response::json($rendezvou, 200);
      }

      public function update(RendezvouRequest $request, $id)
      {
          $rendezvou = Rendezvou::findOrfail($id);
          $rendezvou->update($request->toArray());
          return Response::json(['message' => 'Rendez-vous bien mis à jour'], 200);
      }

      public function destroy($id)
      {
          Rendezvou::destroy($id);
          return Response::json(['message' => 'Rendez-vous bien supprimé'], 200);
      }
}
