<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_login');
    }


    
 public function tableaudebord(Request $request){

    $admin_email=$request->admin_email;
    $admin_password=md5($request->admin_password);
    $result=DB::table('table_admin')
        ->where('admin_email',$admin_email)
        ->where('admin_password',$admin_password)
        ->first();
        if ($result) {
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/tableaudebord');
        }
        else{
            Session::put('message','@mail ou message invalide');
            return Redirect::to('/admin');
         }
    }

    
    

        }

