<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class UserController extends Controller
{
    public function index(){
        if(auth()->user()->role == 'admin')
        return redirect()->route('admin.dashboard');
        elseif(auth()->user()->role == 'affiliate')
        return redirect()->route('affiliate.dashboard',['domain' => auth()->user()->affiliate->username]);
        return view('user.dashboard');
    }

    public function profile(){
        
        return view('user.profile');
    }

    
}
