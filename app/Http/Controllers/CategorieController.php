<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
//session_start();

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $this->AdminAuthCheck();
        return view('admin.ajouter_categorie');
    }

    public function toute_categorie()
    {   $this->AdminAuthCheck();
        $toute_categorie_info=DB::table('table_categorie')->get();
        $manage_categorie=view('admin.toute_categorie')
            ->with('toute_categorie_info',$toute_categorie_info);

        return view('admin_layout')->with('admin.toute_categorie',$manage_categorie);
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
    public function inactive_categorie($categorie_id)
    {
        DB::table('table_categorie')
        ->where('categorie_id',$categorie_id)
        ->update(['publication_status' => 0]);
         Session::put('message','Categorie inactive avec sucess !!');

        return Redirect::to('/toute-categorie');
    }

    public function active_categorie($categorie_id)
    {
        DB::table('table_categorie')
        ->where('categorie_id',$categorie_id)
        ->update(['publication_status' => 1]);
         Session::put('message','Categorie active avec sucess !!');

        return Redirect::to('/toute-categorie');
    }


    public function AdminAuthCheck(){
        $admin=Session::get('admin_id');
        if($admin){
            return;
        }
        else{
            return Redirect::to('/admin')->send();
        }
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
    public function edit_categorie($categorie_id)
    {   $this->AdminAuthCheck();
        $categorie_info=DB::table('table_categorie')
            ->where('categorie_id',$categorie_id)
            ->first();
           $categorie_info=view('admin.edit_categorie')
            ->with('categorie_info',$categorie_info);

        return view('admin_layout')
        ->with('admin.edit_categorie',$categorie_info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modifier_categorie(Request $request,$categorie_id)
    {
        $data=array();
        $data['categorie_nom']=$request->categorie_nom;
        $data['categorie_description']=$request->categorie_description;

        DB::table('table_categorie')
        ->where('categorie_id',$categorie_id)
        ->update($data);
        Session::get('message','Categorie modifiee avec succes');
        return Redirect::to('/toute-categorie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_categorie($categorie_id)
    {
        DB::table('table_categorie')
        ->where('categorie_id',$categorie_id)
        ->delete();
        Session::get('message','Categorie supprimée avec succes');
        return Redirect::to('/toute-categorie');
    }
}
