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
Route::get('/ajouter-produit','ProduitController@index');
Route::post('/sauvegarder-produit','ProduitController@sauvegarder_produit');
Route::get('/tous-produit','ProduitController@tous_produit');
Route::get('/inactive-produit/{produit_id}','ProduitController@inactive_produit');
Route::get('/active-produit/{produit_id}','ProduitController@active_produit');
Route::get('/edit-produit/{produit_id}','ProduitController@edit_produit');
Route::post('/modifier-produit/{produit_id}','ProduitController@modifier_produit');
Route::get('/delete-produit/{produit_id}','ProduitController@delete_produit');
Route::get('/activation-produit','ProduitController@activation_produit');
Route::get('/inactive-produit_inactive/{produit_id}','ProduitController@inactive_produit_inactive');
Route::get('/active-produit_active/{produit_id}','ProduitController@active_produit_active');
//Pour les slides
Route::get('/ajouter-slide','SlideController@index');
Route::post('/sauvegarder-slide','SlideController@sauvegarder_slide');
Route::get('/toute-slide','SlideController@toute_slide');
Route::get('/inactive-slide/{slide_id}','SlideController@inactive_slide');
Route::get('/active-slide/{slide_id}','SlideController@active_slide');
Route::get('/edit-slide/{slide_id}','SlideController@edit_slide');
Route::post('/modifier-slide/{slide_id}','SlideController@modifier_slide');
Route::get('/delete-slide/{slide_id}','SlideController@delete_slide');

//Routes pour les produits par catégorie et par fournisseur
Route::get('/produit_par_categorie/{categorie_id}','HomeController@produit_par_categorie');
Route::get('/produit_par_fournisseur/{fournisseur_id}','HomeController@produit_par_fournisseur');
Route::get('/voir_produit/{produit_id}','HomeController@produit_detail_par_id');

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
