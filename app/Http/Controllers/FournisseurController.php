<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ajouter_fournisseur');
    }

    public function sauvegarder_fournisseur(Request $request)
    {
        $data=array();
        $data['fournisseur_id']=$request->fournisseur_id;
        $data['fournisseur_nom']=$request->fournisseur_nom;
        $data['fournisseur_description']=$request->fournisseur_description;
        $data['publication_status']=$request->publication_status;

        DB::table('table_fournisseur')->insert($data);
        Session::put('message','fournisseur ajoutée avec sucess !!');
        return Redirect::to('/ajouter-fournisseur');
    }

public function tous_fournisseur()
    {
        $tous_fournisseur_info=DB::table('table_fournisseur')->get();
        $manage_fournisseur=view('admin.tous_fournisseur')
            ->with('tous_fournisseur_info',$tous_fournisseur_info);

        return view('admin_layout')->with('admin.tous_fournisseur_info',$manage_fournisseur);
    }


     public function inactive_fournisseur($fournisseur_id)
    {
        DB::table('table_fournisseur')
        ->where('fournisseur_id',$fournisseur_id)
        ->update(['publication_status' => 0]);
         Session::put('message','fournisseur inactive avec sucess !!');

        return Redirect::to('/tous-fournisseur');
    }

    public function active_fournisseur($fournisseur_id)
    {
        DB::table('table_fournisseur')
        ->where('fournisseur_id',$fournisseur_id)
        ->update(['publication_status' => 1]);
         Session::put('message','fournisseur active avec sucess !!');

        return Redirect::to('/tous-fournisseur');
    }

    public function edit_fournisseur($fournisseur_id)
    {
        $fournisseur_info=DB::table('table_fournisseur')
            ->where('fournisseur_id',$fournisseur_id)
            ->first();
           $fournisseur_info=view('admin.edit_fournisseur')
            ->with('fournisseur_info',$fournisseur_info);

        return view('admin_layout')
        ->with('admin.edit_fournisseur',$fournisseur_info);
    }

    public function modifier_fournisseur(Request $request,$fournisseur_id)
    {
        $data=array();
        $data['fournisseur_nom']=$request->fournisseur_nom;
        $data['fournisseur_description']=$request->fournisseur_description;

        DB::table('table_fournisseur')
        ->where('fournisseur_id',$fournisseur_id)
        ->update($data);
        Session::get('message','fournisseur modifiee avec succes');
        return Redirect::to('/tous-fournisseur');
    }

    public function delete_fournisseur($fournisseur_id)
    {
        DB::table('table_fournisseur')
        ->where('fournisseur_id',$fournisseur_id)
        ->delete();
        Session::get('message','fournisseur supprimée avec succes');
        return Redirect::to('/tous-fournisseur');
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
