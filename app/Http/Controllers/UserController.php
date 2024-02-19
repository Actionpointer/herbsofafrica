<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;


class UserController extends Controller
{
    public function index(){
        if(auth()->user()->role == 'admin')
        return redirect()->route('admin.dashboard');
        return view('user.dashboard');
    }

    public function profile(){
        
        return view('user.profile');
    }

    
}
