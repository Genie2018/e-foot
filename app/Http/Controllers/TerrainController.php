<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;


class TerrainController extends Controller
{

    
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AdminAuthCheck();
        return view('admin.ajouter_terrain');
    }

    public function sauvegarder_terrain(Request $request)
    {
        $data=array();
        $data['terrain_id']=$request->terrain_id;
        $data['terrain_nom']=$request->terrain_nom;
        $data['categorie_id']=$request->categorie_id;
        $data['lieu_id']=$request->lieu_id;        
        $data['terrain_prix']=$request->terrain_prix;
        $data['publication_status']=$request->publication_status;


        $image=$request->file('terrain_image');
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
       $data['terrain_image']=$image_url;
       DB::table('table_terrain')->insert($data);
        Session::put('message','terrain ajoutée avec sucess !!');
        return Redirect::to('/ajouter-terrain');
            }
        }
        $data['terrain_image']='';
        DB::table('table_terrain')->insert($data);
        Session::put('message','terrain ajoutée avec sucess sans image!!');
        return Redirect::to('/ajouter-terrain');
    }

    public function tous_terrain()
    {   
        $this->AdminAuthCheck();
        $tous_terrain_info=DB::table('table_terrain')
                        ->join('table_categorie','table_terrain.categorie_id','=','table_categorie.categorie_id')
                        ->join('table_lieu','table_terrain.lieu_id','=','table_lieu.lieu_id')
                        ->get();
        $manage_terrain=view('admin.tous_terrain')
            ->with('tous_terrain_info',$tous_terrain_info);

        return view('admin_layout')->with('admin.tous_terrain',$manage_terrain);
    }

public function activation_terrain()
    {   $this->AdminAuthCheck();
        $activation_terrain_info=DB::table('table_terrain')->get();
        $activation_terrain=view('admin.activation_terrain')
            ->with('activation_terrain_info',$activation_terrain_info);

        return view('admin_layout')->with('admin.activation_terrain',$activation_terrain);
    }


public function inactive_terrain_inactive($terrain_id)
    {
        DB::table('table_terrain')
        ->where('terrain_id',$terrain_id)
        ->update(['publication_status' => 0]);
         Session::put('message','terrain 2 inactive avec sucess !!');

        return Redirect::to('/activation-terrain');
    }

    public function active_terrain_active($terrain_id)
    {
        DB::table('table_terrain')
        ->where('terrain_id',$terrain_id)
        ->update(['publication_status' => 1]);
         Session::put('message','terrain 2 active avec sucess !!');

        return Redirect::to('/activation-terrain');
    }
    
    public function active_terrain($terrain_id)
    {
        DB::table('table_terrain')
        ->where('terrain_id',$terrain_id)
        ->update(['publication_status' => 1]);
         Session::put('message','terrain active avec sucess !!');

        return Redirect::to('/tous-terrain');
    }

         public function inactive_terrain($terrain_id)
    {
        DB::table('table_terrain')
        ->where('terrain_id',$terrain_id)
        ->update(['publication_status' => 0]);
         Session::put('message','terrain inactive avec sucess !!');

        return Redirect::to('/tous-terrain');
    }


         public function delete_terrain($terrain_id)
    {
        DB::table('table_terrain')
        ->where('terrain_id',$terrain_id)
        ->delete();
        Session::get('message','terrain supprimée avec succes');
        return Redirect::to('/tous-terrain');
    }

     public function edit_terrain($terrain_id)
    {
        $terrain_info=DB::table('table_terrain')
            ->where('terrain_id',$terrain_id)
            ->first();
           $terrain_info=view('admin.edit_terrain')
            ->with('terrain_info',$terrain_info);

        return view('admin_layout')
        ->with('admin.edit_terrain',$terrain_info);
    }

    public function modifier_terrain(Request $request,$terrain_id)
    {
        $data=array();
        $data['terrain_id']=$request->terrain_id;
        $data['terrain_nom']=$request->terrain_nom;
        $data['categorie_id']=$request->categorie_id;
        $data['lieu_id']=$request->lieu_id;        
        $data['terrain_prix']=$request->terrain_prix;        
        $data['publication_status']=$request->publication_status;

        DB::table('table_terrain')
        ->where('terrain_id',$terrain_id)
        ->update($data);
        Session::get('message','terrain modifiee avec succes');
        return Redirect::to('/tous-terrain');
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
