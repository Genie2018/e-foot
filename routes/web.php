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

//Produit
Route::get('/ajouter-produit','ProduitController@index');
Route::post('/sauvegarder-produit','ProduitController@sauvegarder_produit');
Route::get('/tous-produit','ProduitController@tous_produit');
Route::get('/inactive-produit/{produit_id}','ProduitController@inactive_produit');
Route::get('/active-produit/{produit_id}','ProduitController@active_produit');
Route::get('/edit-produit/{produit_id}','ProduitController@edit_produit');
Route::post('/modifier-produit/{produit_id}','ProduitController@modifier_produit');
Route::get('/delete-produit/{produit_id}','ProduitController@delete_produit');

//Stock Routes
Route::get('/ajouter-stock','StockController@index');
Route::post('/sauvegarder-stock','StockController@sauvegarder_stock');

