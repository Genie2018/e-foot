<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
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
      /* $toute_categorie_info=DB::table('table_categorie')
                            ->where('publication_status',1)
                            ->get();
        $manage_categorie=view('pages.payement')
            ->with('toute_categorie_info',$toute_categorie_info);

        return view('layout')->with('pages.payement',$manage_categorie);*/
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
                if ($result) {
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



    public function payement()
    {
        return view('pages.payement');
    }

public function merci()
    {
        return view('pages.merci');
    }

    public function valider_payement(Request $request)
    {
     $vdata=array();
     $vdata['client_id']=Session::get('client_id');
     $vdata['commander_id']=Session::get('commander_id');
     $vdata['order_total']=Cart::total();
     $order_id=DB::table('table_order')
        ->insertGetId($vdata);
        $contents=Cart::content();
        $vddata=array();

        foreach ($contents as $v_content) {
            $vddata['order_id']=$order_id;
            $vddata['terrain_id']=$v_content->id;
            $vddata['terrain_nom']=$v_content->name;
            $vddata['terrain_prix']=$v_content->price;
            //$vddata['produit_quantite']=$v_content->qty;

            DB::table('table_order_details')
                ->insert($vddata);

        }
        if ($vdata && $vddata) {
            return Redirect::to('/merci-client');
        }
        else{
               return Redirect::to('/payement');
         }
        
    }

    public function payement_boutique()
    {
        $tous_payement_info=DB::table('table_order')
                        ->join('table_client','table_order.client_id','=','table_client.client_id')
                        ->select('table_order.*','table_client.client_nom')
                        ->get();
        $manage_payement=view('admin.payement_boutique')
            ->with('tous_payement_info',$tous_payement_info);

        return view('admin_layout')->with('admin.payement_boutique',$manage_payement);
    }

    public function voir_commande(){
        $tous_commande_info=DB::table('table_order')
                        ->join('table_client','table_order.client_id','=','table_client.client_id')
                        ->join('table_order_details','table_order.order_id','=','table_order_details.order_id')
                        ->join('table_commander','table_order.commander_id','=','table_commander.commander_id')
    ->select('table_order.*','table_order_details.*','table_commander.*','table_client.*')
                        ->first();
        $manage_commande=view('admin.voir_commande')
            ->with('tous_commande_info',$tous_commande_info);

        return view('admin_layout')->with('admin.voir_commande',$manage_commande);
    }

}
