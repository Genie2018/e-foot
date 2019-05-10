<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ajouter_categorie');
    }

    public function toute_categorie()
    {
        $toute_categorie_info=DB::table('table_categorie')->get();
        $manage_categorie=view('admin.toute_categorie')
            ->with('toute_categorie_info',$toute_categorie_info);

        return view('admin_layout')->with('toute_categorie',$manage_categorie);
    }

    public function sauvegarder_categorie(Request $request)
    {
        $data=array();
        $data['categorie_id']=$request->categorie_id;
        $data['categorie_nom']=$request->categorie_nom;
        $data['categorie_description']=$request->categorie_description;
        $data['publication_status']=$request->publication_status;

        DB::table('table_categorie')->insert($data);
        Session::put('message','Categorie ajoutée avec sucess !!');
        return Redirect::to('/ajouter-categorie');
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
