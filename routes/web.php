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
//Frontend site ..........
Route::get('/','HomeController@index');









//Backend site...................................
Route::get('/admin','AdminController@index');
Route::get('/tableaudebord','AdminController@show_tableaudebord');
Route::post('/admin-tableaudebord','AdminController@tableaudebord');
Route::get('/deconnecter','SuperAdminController@deconnecter');

//category related route
Route::get('/ajouter-categorie','CategorieController@index');
Route::get('/toute-categorie','CategorieController@toute_categorie');
Route::post('/sauvegarder-categorie','CategorieController@sauvegarder_categorie');
Route::get('/inactive-categorie/{categorie_id}','CategorieController@inactive_categorie');
Route::get('/active-categorie/{categorie_id}','CategorieController@active_categorie');
Route::get('/edit-categorie/{categorie_id}','CategorieController@edit_categorie');
Route::post('/modifier-categorie/{categorie_id}','CategorieController@modifier_categorie');
Route::get('/delete-categorie/{categorie_id}','CategorieController@delete_categorie');

//fournisseur
Route::get('/ajouter-fournisseur','FournisseurController@index');
Route::post('/sauvegarder-fournisseur','FournisseurController@sauvegarder_fournisseur');
Route::get('/tous-fournisseur','FournisseurController@tous_fournisseur');
Route::get('/inactive-fournisseur/{fournisseur_id}','FournisseurController@inactive_fournisseur');
Route::get('/active-fournisseur/{fournisseur_id}','FournisseurController@active_fournisseur');
Route::get('/edit-fournisseur/{fournisseur_id}','FournisseurController@edit_fournisseur');
Route::post('/modifier-fournisseur/{fournisseur_id}','FournisseurController@modifier_fournisseur');
Route::get('/delete-fournisseur/{fournisseur_id}','FournisseurController@delete_fournisseur');

//produit Routes
Route::get('/ajouter-produit','produitController@index');
Route::post('/sauvegarder-produit','produitController@sauvegarder_produit');

