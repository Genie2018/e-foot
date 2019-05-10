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

