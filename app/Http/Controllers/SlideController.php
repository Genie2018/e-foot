<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
//session_start();

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $this->AdminAuthCheck();
        return view('admin.ajouter_slide');
    }

    public function toute_slide()
    {   $this->AdminAuthCheck();
        $toute_slide_info=DB::table('table_slide')->get();
        $manage_slide=view('admin.toute_slide')
            ->with('toute_slide_info',$toute_slide_info);

        return view('admin_layout')->with('admin.toute_slide',$manage_slide);
    }

    public function sauvegarder_slide(Request $request)
    {
        $data=array();
        $data['slide_id']=$request->slide_id;
        $data['publication_status']=$request->publication_status;

    $image=$request->file('slide_image');
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);

            if($success){
       $data['slide_image']=$image_url;
       DB::table('table_slide')->insert($data);
        Session::put('message','slide ajoutée avec sucess !!');
        return Redirect::to('/ajouter-slide');
            }
        }
        $data['slide_image']='';
        DB::table('table_slide')->insert($data);
        Session::put('message','slide ajoutée avec sucess sans image!!');
        return Redirect::to('/ajouter-slide');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive_slide($slide_id)
    {
        DB::table('table_slide')
        ->where('slide_id',$slide_id)
        ->update(['publication_status' => 0]);
         Session::put('message','slide inactive avec sucess !!');

        return Redirect::to('/toute-slide');
    }

    public function active_slide($slide_id)
    {
        DB::table('table_slide')
        ->where('slide_id',$slide_id)
        ->update(['publication_status' => 1]);
         Session::put('message','slide active avec sucess !!');

        return Redirect::to('/toute-slide');
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
    public function edit_slide($slide_id)
    {   $this->AdminAuthCheck();
        $slide_info=DB::table('table_slide')
            ->where('slide_id',$slide_id)
            ->first();
           $slide_info=view('admin.edit_slide')
            ->with('slide_info',$slide_info);

        return view('admin_layout')
        ->with('admin.edit_slide',$slide_info);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function modifier_slide(Request $request,$slide_id)
    {
        $data=array();
        $data['slide_nom']=$request->slide_nom;
        $data['slide_description']=$request->slide_description;

        DB::table('table_slide')
        ->where('slide_id',$slide_id)
        ->update($data);
        Session::get('message','slide modifiee avec succes');
        return Redirect::to('/toute-slide');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_slide($slide_id)
    {
        DB::table('table_slide')
        ->where('slide_id',$slide_id)
        ->delete();
        Session::get('message','slide supprimée avec succes');
        return Redirect::to('/toute-slide');
    }
}
