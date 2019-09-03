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
        $terrain_id=$request->terrain_id;
        $terrain_info=DB::table('table_terrain')
                      ->where('terrain_id',$terrain_id)
                      ->first();
        $data['qty']=$qty;
        $data['id']=$terrain_info->terrain_id;
        $data['name']=$terrain_info->terrain_nom;
        $data['price']=$terrain_info->terrain_prix;
        $data['options']['image']=$terrain_info->terrain_image;

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
   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function supprimer_panier($rowId)
    {
        Cart::update($rowId,0);
        return Redirect::to('/voir-panier');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_panier(Request $request)
    {
        $qty=$request->qty;
        $rowId=$request->rowId;
        Cart::update($rowId,$qty);
        return Redirect::to('/voir-panier');
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
