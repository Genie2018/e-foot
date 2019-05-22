<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    public function index(){

         $this->AdminAuthCheck();
         return view('admin.tableaudebord');
    }

     public function deconnecter()
    {
     //   Session::put('admin_name',null);
       // Session::put('admin_id',null);
        Session::flush();
        return Redirect::to('/admin');
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
}
