<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tous_terrain_publication=DB::table('table_terrain')
                    ->join('table_categorie','table_terrain.categorie_id','=','table_categorie.categorie_id')
                    ->join('table_lieu','table_terrain.lieu_id','=','table_lieu.lieu_id')
                    ->select('table_terrain.*','table_categorie.categorie_surface','table_lieu.lieu_nom')     
                    ->where('table_terrain.publication_status',1)
                    ->limit(9)
                    ->get();
        $manage_terrain=view('pages.home_content')
            ->with('tous_terrain_publication',$tous_terrain_publication);

        return view('layout')->with('pages.home_content',$manage_terrain);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //Affichage des terrains par categorie
    public function terrain_par_categorie($categorie_id)
    {
     $terrain_par_categorie=DB::table('table_terrain')
                       ->join('table_categorie','table_terrain.categorie_id','=','table_categorie.categorie_id')
                       ->select('table_terrain.*','table_categorie.categorie_surface')
                       ->where('table_categorie.categorie_id',$categorie_id)
                       ->limit(12)
                       ->get();
        $manage_terrain_par_categorie=view('pages.terrain_par_categorie')
            ->with('terrain_par_categorie',$terrain_par_categorie);

        return view('layout')->with('pages.terrain_par_categorie',$manage_terrain_par_categorie);   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //Affichage des terrains par lieu
    public function terrain_par_lieu($lieu_id)
    {
      $terrain_par_lieu=DB::table('table_terrain')
                    ->join('table_categorie','table_terrain.categorie_id','=','table_categorie.categorie_id')
                    ->join('table_lieu','table_terrain.lieu_id','=','table_lieu.lieu_id')
                    ->select('table_terrain.*','table_categorie.categorie_surface','table_lieu.lieu_nom')     
                    ->where('table_lieu.lieu_id',$lieu_id)
                    ->limit(9)
                    ->get();
        $manage_terrain_par_lieu=view('pages.terrain_par_lieu')
            ->with('terrain_par_lieu',$terrain_par_lieu);

        return view('layout')->with('pages.terrain_par_lieu',$manage_terrain_par_lieu);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function terrain_detail_par_id($terrain_id)
    {
     $terrain_detail=DB::table('table_terrain')
                    ->join('table_categorie','table_terrain.categorie_id','=','table_categorie.categorie_id')
                    ->join('table_lieu','table_terrain.lieu_id','=','table_lieu.lieu_id')
                    ->select('table_terrain.*','table_categorie.categorie_surface','table_lieu.lieu_nom')     
                    ->where('table_terrain.terrain_id',$terrain_id)
                    ->where('table_terrain.publication_status',1)
                    ->first();
        $manage_terrain_detail=view('pages.terrain_detail')
            ->with('terrain_detail',$terrain_detail);

        return view('layout')->with('pages.terrain_detail',$manage_terrain_detail);   
    }

    
}
