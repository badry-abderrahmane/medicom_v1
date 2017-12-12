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

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('clients', 'ClientsController');
Route::resource('prospects', 'ProspectsController');
Route::resource('devis', 'DevisController');
Route::resource('commandes', 'CommandesController');
Route::resource('factures', 'FacturesController');
Route::resource('fournisseurs', 'FournisseursController');
Route::resource('categories', 'CategoriesController');
Route::resource('produits', 'ProduitsController');
Route::resource('bondecommandes', 'BondecommandesController');
Route::resource('rendezvous', 'RendezvousController');
Route::resource('visites', 'VisitesController');
Route::resource('calendrier', 'CalendrierController');
