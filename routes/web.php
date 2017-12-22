<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/wayway', function() {
    return Auth::user();
});

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('clients', 'ClientsController');
Route::resource('prospects', 'ProspectsController');

Route::resource('devis', 'DevisController');
Route::delete('/devisproduits/{id}', 'DevisController@destroyDevisproduit');

Route::resource('commandes', 'CommandesController');
Route::delete('/commandesproduits/{id}', 'CommandesController@destroyCommandesproduit');


Route::resource('factures', 'FacturesController');
Route::delete('/facturesproduits/{id}', 'FacturesController@destroyFacturesproduit');

Route::resource('fournisseurs', 'FournisseursController');
Route::resource('categories', 'CategoriesController');
Route::resource('produits', 'ProduitsController');

Route::resource('bondecommandes', 'BondecommandesController');
Route::delete('/bondecommandesproduits/{id}', 'BondecommandesController@destroyBondecommandesproduit');

Route::resource('rendezvous', 'RendezvousController');
Route::resource('visites', 'VisitesController');
Route::resource('calendrier', 'CalendrierController');


/**
** Get Files
**
**/
Route::get('pdf/devis/{id}', 'PdfmakerController@getDevis');

/**
** Get Lists
**
**/
Route::get('list/clients', function(){
  $list = \App\Client::pluck('name','id')->toJson();
  return $list;
});
Route::get('list/prospects', function(){
  $list = \App\Prospect::pluck('name','id')->toJson();
  return $list;
});
Route::get('list/fournisseurs', function(){
  $list = \App\Fournisseur::pluck('name','id')->toJson();
  return $list;
});
Route::get('list/categories', function(){
  $list = \App\Category::pluck('name','id')->toJson();
  return $list;
});
Route::get('list/produits', function(){
  $list = \App\Produit::pluck('name','id')->toJson();
  return $list;
});

Route::get('prix/produits', function(){
  $list = \App\Produit::pluck('prixVente','id')->toJson();
  return $list;
});
