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
Route::get('/accueil','HomeController@index');









//Backend site...................................
Route::get('/admin','AdminController@index');
Route::get('/tableaudebord','SuperAdminController@index');
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

//Lieu
Route::get('/ajouter-lieu','LieuController@index');
Route::post('/sauvegarder-lieu','LieuController@sauvegarder_lieu');
Route::get('/tous-lieu','LieuController@tous_lieu');
Route::get('/inactive-lieu/{lieu_id}','LieuController@inactive_lieu');
Route::get('/active-lieu/{lieu_id}','LieuController@active_lieu');
Route::get('/edit-lieu/{lieu_id}','LieuController@edit_lieu');
Route::post('/modifier-lieu/{lieu_id}','LieuController@modifier_lieu');
Route::get('/delete-lieu/{lieu_id}','LieuController@delete_lieu');

//Terrain Routes
Route::get('/ajouter-terrain','TerrainController@index');
Route::post('/sauvegarder-terrain','TerrainController@sauvegarder_terrain');
Route::get('/tous-terrain','TerrainController@tous_terrain');
Route::get('/inactive-terrain/{terrain_id}','TerrainController@inactive_terrain');
Route::get('/active-terrain/{terrain_id}','TerrainController@active_terrain');
Route::get('/edit-terrain/{terrain_id}','TerrainController@edit_terrain');
Route::post('/modifier-terrain/{terrain_id}','TerrainController@modifier_terrain');
Route::get('/delete-terrain/{terrain_id}','TerrainController@delete_terrain');
Route::get('/activation-terrain','TerrainController@activation_terrain');
Route::get('/inactive-terrain_inactive/{terrain_id}','TerrainController@inactive_terrain_inactive');
Route::get('/active-terrain_active/{terrain_id}','TerrainController@active_terrain_active');
//Pour les slides
Route::get('/ajouter-slide','SlideController@index');
Route::post('/sauvegarder-slide','SlideController@sauvegarder_slide');
Route::get('/toute-slide','SlideController@toute_slide');
Route::get('/inactive-slide/{slide_id}','SlideController@inactive_slide');
Route::get('/active-slide/{slide_id}','SlideController@active_slide');
Route::get('/edit-slide/{slide_id}','SlideController@edit_slide');
Route::post('/modifier-slide/{slide_id}','SlideController@modifier_slide');
Route::get('/delete-slide/{slide_id}','SlideController@delete_slide');

//Routes pour les terrains par catégorie et par lieu
Route::get('/terrain_par_categorie/{categorie_id}','HomeController@terrain_par_categorie');
Route::get('/terrain_par_lieu/{lieu_id}','HomeController@terrain_par_lieu');
Route::get('/voir_terrain/{terrain_id}','HomeController@terrain_detail_par_id');

//Ajout au panier
Route::post('/ajouter-au-panier','PanierController@ajouter_au_panier');
Route::get('/voir-panier','PanierController@voir_panier');
Route::get('/supprimer-panier/{rowId}','PanierController@supprimer_panier');
Route::post('/update-panier','PanierController@update_panier');

//commander et log client routes
Route::get('/commander-login','CommanderController@commander_login');
Route::get('/commander','CommanderController@commander');
Route::post('/inscription-client','CommanderController@inscription_client');
Route::post('/save-detail-commande','CommanderController@save_detail_commande');

//client connexion et deconnection
Route::post('/connexion-client','CommanderController@connexion_client');
Route::get('/deconnexion-client','CommanderController@deconnexion_client');


Route::get('/payement','CommanderController@payement');
Route::post('/valider-payement','CommanderController@valider_payement');

//Ma boutique
Route::get('/payement-boutique','CommanderController@payement_boutique');

Route::get('/merci-client','CommanderController@merci');

Route::get('/voir-commande/{order_id}','CommanderController@voir_commande');

