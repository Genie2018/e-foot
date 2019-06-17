<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class CommanderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function commander_login()
    {
        return view('pages.connecter');
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function inscription_client(Request $request)
    {
        $data=array();
        $data['client_nom']=$request->client_nom;
        $data['client_email']=$request->client_email;
        $data['client_password']=$request->client_password;
        $data['client_telephone']=$request->client_telephone;

        $client_id=DB::table('table_client')
                    ->insertGetId($data);
                    Session::put('client_id',$client_id);
                    Session::put('client_nom',$request->client_nom);
                    return Redirect('/commander');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function commander()
    {
        return view('pages.commander');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function save_detail_commande(Request $request)
    {
        $data=array();
        $data['commander_email']=$request->commander_email;
        $data['commander_nom']=$request->commander_nom;
        $data['commander_prenom']=$request->commander_prenom;
        $data['commander_adresse']=$request->commander_adresse;
        $data['commander_telephone']=$request->commander_telephone;

        $commander_id=DB::table('table_commander')
                    ->insertGetId($data);
                    Session::put('commander_id',$commander_id);
                    return Redirect::to('/payement');
    }

    public function connexion_client(Request $request)
    {
        $client_email=$request->client_email;
        $client_password=$request->client_password;
        $result=DB::table('table_client')
                ->where('client_email',$client_email)
                ->where('client_password',$client_password)
                ->first();
                if (result) {
                    Session::put('client_id',$result->client_id);
                    return Redirect::to('/commander');
                }else{
                    return Redirect::to('/commander-login');
                }
    }

    public function deconnexion_client()
    {
        Session::flush();
        return Redirect::to('/');
    }
}
