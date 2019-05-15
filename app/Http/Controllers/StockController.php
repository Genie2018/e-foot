<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ajouter_stock');
    }

    public function sauvegarder_stock(Request $request)
    {
        $data=array();
        $data['stock_nom']=$request->stock_nom;
        $data['categorie_id']=$request->categorie_id;
        $data['produit_id']=$request->produit_id;        
        $data['stock_court_desc']=$request->stock_court_desc;
        $data['stock_long_desc']=$request->stock_long_desc;
        $data['stock_prix']=$request->stock_prix;
        $data['stock_size']=$request->stock_size;
        $data['stock_couleur']=$request->stock_couleur;        
        $data['publication_status']=$request->publication_status;


        $image=$request->file('stock_image');
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
       $data['stock_image']=$image_url;
       DB::table('table_stock')->insert($data);
        Session::put('message','Stock ajoutée avec sucess !!');
        return Redirect::to('/ajouter-stock');
            }
        }
        $data['stock_image']='';
        DB::table('table_stock')->insert($data);
        Session::put('message','Stock ajoutée avec sucess sans image!!');
        return Redirect::to('/ajouter-stock');
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
