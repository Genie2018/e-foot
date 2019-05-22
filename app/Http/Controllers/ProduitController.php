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
        $data['categorie_id']=$request->categorie_id;
        $data['fournisseur_id']=$request->fournisseur_id;        
        $data['produit_court_desc']=$request->produit_court_desc;
        $data['produit_long_desc']=$request->produit_long_desc;
        $data['produit_prix']=$request->produit_prix;
        $data['produit_size']=$request->produit_size;
        $data['produit_couleur']=$request->produit_couleur;        
        $data['publication_status']=$request->publication_status;


        $image=$request->file('produit_image');
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
       $data['produit_image']=$image_url;
       DB::table('table_produit')->insert($data);
        Session::put('message','produit ajoutée avec sucess !!');
        return Redirect::to('/ajouter-produit');
            }
        }
        $data['produit_image']='';
        DB::table('table_produit')->insert($data);
        Session::put('message','produit ajoutée avec sucess sans image!!');
        return Redirect::to('/ajouter-produit');
    }

    public function tous_produit()
    {
        $tous_produit_info=DB::table('table_produit')
                        ->join('table_categorie','table_produit.categorie_id','=','table_categorie.categorie_id')
                        ->join('table_fournisseur','table_produit.fournisseur_id','=','table_fournisseur.fournisseur_id')
                        ->get();
        $manage_produit=view('admin.tous_produit')
            ->with('tous_produit_info',$tous_produit_info);

        return view('admin_layout')->with('admin.tous_produit',$manage_produit);
    }


    
    public function active_produit($produit_id)
    {
        DB::table('table_produit')
        ->where('produit_id',$produit_id)
        ->update(['publication_status' => 1]);
         Session::put('message','Produit active avec sucess !!');

        return Redirect::to('/tous-produit');
    }

         public function inactive_produit($produit_id)
    {
        DB::table('table_produit')
        ->where('produit_id',$produit_id)
        ->update(['publication_status' => 0]);
         Session::put('message','Produit inactive avec sucess !!');

        return Redirect::to('/tous-produit');
    }


         public function delete_produit($produit_id)
    {
        DB::table('table_produit')
        ->where('produit_id',$produit_id)
        ->delete();
        Session::get('message','Produit supprimée avec succes');
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
