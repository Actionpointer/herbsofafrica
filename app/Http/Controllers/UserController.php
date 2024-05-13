<?php

namespace App\Http\Controllers;

use Closure;
use App\Models\User;
use App\Models\Currency;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        if(auth()->user()->role && in_array('admin',auth()->user()->role))
        return redirect()->route('admin.dashboard');
        return view('user.dashboard');
    }

    public function admin(){
        return view('admin.index');
    }

    public function profile(){
        $user = User::where('id', auth()->id())->first();
        if(auth()->user()->role && in_array('admin',auth()->user()->role))
        return view('admin.profile', compact('user'));
        return view('user.profile',compact('user'));
    }

    public function profile_update(Request $request){
        /** @var \App\Models\User $user **/
        $user = auth()->user();
        $request->validate([
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'email' => ['required', 'string','email',Rule::unique('users')->ignore($user->id),],
            'password' => ['nullable', 'string','confirmed'],
            'current_password' => ['nullable', function (string $attribute, mixed $value, Closure $fail)use($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail("The Current Password is invalid.");
                }
            },],
        ]);
        
        User::where('id',auth()->id())->update(['email'=> $request->email,
        'first_name'=> $request->first_name,'last_name'=> $request->last_name]);
        if($request->current_password && $request->password && $request->password_confirmation){
                $user->password = Hash::make($request->password);
                $user->save();
        }
        
        return redirect()->back();
    }

    public function customers(){
        $customers = User::whereNull('role')->get();
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
        $staffs = User::where('role','!=',null)->get();
        $permissions = ["categories", "shipments", "products", "orders", "customers", "affiliates", "staff", "payments", "settlements", "revenues", "posts", "settings"];
        return view('admin.user.staff',compact('staffs','permissions'));
    }

    public function manage(Request $request){
        $role = $request->permissions;
        array_unshift($role,'admin');
        if($request->action == 'create'){
            $request->validate([
                'email' => 'required|unique:users,email',
            ]);
            User::create(['first_name'=> $request->first_name,'last_name'=> $request->last_name,'email'=> $request->email,
            'password'=> Hash::make($request->password), 'role'=> $role]);
        }elseif($request->action == 'delete'){
            User::where('id',$request->user_id)->delete();
        }else{
            $user = User::find($request->user_id);
            $user->status = $request->status;
            if($user->role)
            $user->role = $role;
            $user->save();
        }
        return redirect()->back();
    }

    
}
