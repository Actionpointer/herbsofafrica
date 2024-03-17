<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Currency;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function index(){
        if(auth()->user()->role == 'admin')
        return redirect()->route('admin.dashboard');
        elseif(auth()->user()->role == 'affiliate')
        return redirect()->route('affiliate.overview');
        return view('user.dashboard');
    }

    public function profile(){
        
        return view('user.profile');
    }

    public function customers(){
        $customers = User::where('role','customer')->get();
        $currencies = Currency::all();
        return view('admin.user.customers',compact('customers','currencies'));
    }
    public function affiliates(){
        $affiliates = Affiliate::all();
        $currencies = Currency::all();
        return view('admin.user.affiliates',compact('affiliates','currencies'));
    }

    public function affiliates_commission(Request $request){
        Affiliate::where('id',$request->affiliate_id)->update(['percentage'=> $request->percentage]);
        return redirect()->back();
    }

    public function staff(){
        $staffs = User::where('role','admin')->get();
        return view('admin.user.staff',compact('staffs'));
    }

    public function manage(Request $request){
        if($request->action == 'create'){
            $request->validate([
                'email' => 'required|unique:users,email',
            ]);
    
            User::create(['first_name'=> $request->first_name,'last_name'=> $request->last_name,'email'=> $request->email,
            'password'=> Hash::make($request->password), 'role'=> 'admin']);
        }elseif($request->action == 'delete'){
            User::where('id',$request->user_id)->delete();
        }else{
            User::where('id',$request->user_id)->update(['status'=> $request->status]);
        }
        return redirect()->back();
    }

    
}
