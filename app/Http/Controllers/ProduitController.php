<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ajouter_produit');
    }

    public function sauvegarder_produit(Request $request)
    {
        $data=array();
        $data['produit_id']=$request->produit_id;
        $data['produit_nom']=$request->produit_nom;
        $data['produit_description']=$request->produit_description;
        $data['publication_status']=$request->publication_status;

        DB::table('table_produit')->insert($data);
        Session::put('message','Produit ajoutée avec sucess !!');
        return Redirect::to('/ajouter-produit');
    }

public function tous_produit()
    {
        $tous_produit_info=DB::table('table_produit')->get();
        $manage_produit=view('admin.tous_produit')
            ->with('tous_produit_info',$tous_produit_info);

        return view('admin_layout')->with('admin.tous_produit_info',$manage_produit);
    }


     public function inactive_produit($produit_id)
    {
        DB::table('table_produit')
        ->where('produit_id',$produit_id)
        ->update(['publication_status' => 0]);
         Session::put('message','produit inactive avec sucess !!');

        return Redirect::to('/tous-produit');
    }

    public function active_produit($produit_id)
    {
        DB::table('table_produit')
        ->where('produit_id',$produit_id)
        ->update(['publication_status' => 1]);
         Session::put('message','produit active avec sucess !!');

        return Redirect::to('/tous-produit');
    }

    public function edit_produit($produit_id)
    {
        $produit_info=DB::table('table_produit')
            ->where('produit_id',$produit_id)
            ->first();
           $produit_info=view('admin.edit_produit')
            ->with('produit_info',$produit_info);

        return view('admin_layout')
        ->with('admin.edit_produit',$produit_info);
    }

    public function modifier_produit(Request $request,$produit_id)
    {
        $data=array();
        $data['produit_nom']=$request->produit_nom;
        $data['produit_description']=$request->produit_description;

        DB::table('table_produit')
        ->where('produit_id',$produit_id)
        ->update($data);
        Session::get('message','produit modifiee avec succes');
        return Redirect::to('/tous-produit');
    }

    public function delete_produit($produit_id)
    {
        DB::table('table_produit')
        ->where('produit_id',$produit_id)
        ->delete();
        Session::get('message','produit supprimée avec succes');
        return Redirect::to('/tous-produit');
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
