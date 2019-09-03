<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class LieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ajouter_lieu');
    }

    public function sauvegarder_lieu(Request $request)
    {
        $data=array();
        $data['lieu_id']=$request->lieu_id;
        $data['lieu_nom']=$request->lieu_nom;
        $data['publication_status']=$request->publication_status;

        DB::table('table_lieu')->insert($data);
        Session::put('message','lieu ajoutée avec sucess !!');
        return Redirect::to('/ajouter-lieu');
    }

public function tous_lieu()
    {
        $tous_lieu_info=DB::table('table_lieu')->get();
        $manage_lieu=view('admin.tous_lieu')
            ->with('tous_lieu_info',$tous_lieu_info);

        return view('admin_layout')->with('admin.tous_lieu_info',$manage_lieu);
    }


     public function inactive_lieu($lieu_id)
    {
        DB::table('table_lieu')
        ->where('lieu_id',$lieu_id)
        ->update(['publication_status' => 0]);
         Session::put('message','lieu inactive avec sucess !!');

        return Redirect::to('/tous-lieu');
    }

    public function active_lieu($lieu_id)
    {
        DB::table('table_lieu')
        ->where('lieu_id',$lieu_id)
        ->update(['publication_status' => 1]);
         Session::put('message','lieu active avec sucess !!');

        return Redirect::to('/tous-lieu');
    }

    public function edit_lieu($lieu_id)
    {
        $lieu_info=DB::table('table_lieu')
            ->where('lieu_id',$lieu_id)
            ->first();
           $lieu_info=view('admin.edit_lieu')
            ->with('lieu_info',$lieu_info);

        return view('admin_layout')
        ->with('admin.edit_lieu',$lieu_info);
    }

    public function modifier_lieu(Request $request,$lieu_id)
    {
        $data=array();
        $data['lieu_nom']=$request->lieu_nom;

        DB::table('table_lieu')
        ->where('lieu_id',$lieu_id)
        ->update($data);
        Session::get('message','lieu modifiee avec succes');
        return Redirect::to('/tous-lieu');
    }

    public function delete_lieu($lieu_id)
    {
        DB::table('table_lieu')
        ->where('lieu_id',$lieu_id)
        ->delete();
        Session::get('message','lieu supprimée avec succes');
        return Redirect::to('/tous-lieu');
    }

}
