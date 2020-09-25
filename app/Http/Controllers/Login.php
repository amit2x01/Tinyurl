<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Session;
class Login extends Controller
{
    function login(Request $Request){
        $Request->validate([
            'username'       =>  'required',
            'password'      => 'required'
        ]);

        $admin_details = admin::where([
            'username' => $Request->username,
            'password' => md5(sha1($Request->password))
        ])->get()->toarray();  
        
        if(count($admin_details) > 0){
            Session::push('loggedId', $admin_details[0]['id']);
            return redirect('/ap/dashboard');
        }else{
            Session::flash('error', "Invalid Details");
            return redirect('/ap/login');
        }
    }
}
