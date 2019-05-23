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
                        ->limit(9)
                        ->get();
        $manage_produit_publication=view('pages.home_content')
            ->with('tous_produit_publication',$tous_produit_publication);

        return view('layout')->with('pages.home_content',$manage_produit_publication);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
