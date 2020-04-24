<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
session_start();
class AdminController extends Controller
{
    //
    public function index(){
        return view('admin/dashboard');
    }

    public function login(){
        return view('admin/login');
    }

    public function dashboard(Request $request){
        
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result= DB::table('tbl_admin') // Calling database table directly
                ->where('admin_email', $admin_email) // Matching Form Data from Database
                ->where('admin_password',$admin_password) // Matching Form Data from Database
                ->first();
       
        // echo "<pre>";        
        // print_r($result);
        // echo "</pre>";
        
        if($result){
            Session::put('admin_name', $request->admin_name);
            Session::put('admin_id', $request->admin_id );
            return Redirect::to('/admin');
            //return "hehehehehe";
        
        }else{
            session::put('error_login', 'Email Or Password InValid');
            return Redirect::to('/login');
            //return "nanana";
        }
    
    }


}
