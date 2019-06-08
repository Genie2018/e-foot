<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Illuminate\Support\Facades\Redirect;
class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajouter_au_panier(Request $request)
    {
        $qty=$request->qty;
        $produit_id=$request->produit_id;
        $produit_info=DB::table('table_produit')
                      ->where('produit_id',$produit_id)
                      ->first();
        $data['qty']=$qty;
        $data['id']=$produit_info->produit_id;
        $data['name']=$produit_info->produit_nom;
        $data['price']=$produit_info->produit_prix;
        $data['options']['image']=$produit_info->produit_image;

        Cart::add($data);
        return Redirect::to('/voir-panier');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function voir_panier()
    {
        $toute_categorie_info=DB::table('table_categorie')
                            ->where('publication_status',1)
                            ->get();
        $manage_categorie=view('pages.ajouter_au_panier')
            ->with('toute_categorie_info',$toute_categorie_info);

        return view('layout')->with('pages.ajouter_au_panier',$manage_categorie);                    
    
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
