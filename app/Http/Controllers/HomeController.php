<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tous_produit_publication=DB::table('table_produit')
                    ->join('table_categorie','table_produit.categorie_id','=','table_categorie.categorie_id')
                    ->join('table_fournisseur','table_produit.fournisseur_id','=','table_fournisseur.fournisseur_id')
                    ->select('table_produit.*','table_categorie.categorie_nom','table_fournisseur.fournisseur_nom')     
                    ->where('table_produit.publication_status',1)
                    ->limit(9)
                    ->get();
        $manage_produit=view('pages.home_content')
            ->with('tous_produit_publication',$tous_produit_publication);

        return view('layout')->with('pages.home_content',$manage_produit);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function produit_par_categorie($categorie_id)
    {
     $produit_par_categorie=DB::table('table_produit')
                       ->join('table_categorie','table_produit.categorie_id','=','table_categorie.categorie_id')
                       ->select('table_produit.*','table_categorie.categorie_nom')
                       ->where('table_categorie.categorie_id',$categorie_id)
                       ->limit(12)
                       ->get();
        $manage_produit_par_categorie=view('pages.produit_par_categorie')
            ->with('produit_par_categorie',$produit_par_categorie);

        return view('layout')->with('pages.produit_par_categorie',$manage_produit_par_categorie);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function produit_par_fournisseur($fournisseur_id)
    {
      $produit_par_fournisseur=DB::table('table_produit')
                    ->join('table_categorie','table_produit.categorie_id','=','table_categorie.categorie_id')
                    ->join('table_fournisseur','table_produit.fournisseur_id','=','table_fournisseur.fournisseur_id')
                    ->select('table_produit.*','table_categorie.categorie_nom','table_fournisseur.fournisseur_nom')     
                    ->where('table_fournisseur.fournisseur_id',$fournisseur_id)
                    ->limit(9)
                    ->get();
        $manage_produit_par_fournisseur=view('pages.produit_par_fournisseur')
            ->with('produit_par_fournisseur',$produit_par_fournisseur);

        return view('layout')->with('pages.produit_par_fournisseur',$manage_produit_par_fournisseur);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function produit_detail_par_id($produit_id)
    {
     $produit_detail=DB::table('table_produit')
                    ->join('table_categorie','table_produit.categorie_id','=','table_categorie.categorie_id')
                    ->join('table_fournisseur','table_produit.fournisseur_id','=','table_fournisseur.fournisseur_id')
                    ->select('table_produit.*','table_categorie.categorie_nom','table_fournisseur.fournisseur_nom')     
                    ->where('table_produit.produit_id',$produit_id)
                    ->where('table_produit.publication_status',1)
                    ->first();
        $manage_produit_detail=view('pages.produit_detail')
            ->with('produit_detail',$produit_detail);

        return view('layout')->with('pages.produit_detail',$manage_produit_detail);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
