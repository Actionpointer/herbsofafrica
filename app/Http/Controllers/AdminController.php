<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{

    public function dashboard(){
        abort_if(auth()->user()->role != 'admin',503,'Something went wrong');
        return view('admin.index');
    }

    public function profile(){
        $user = User::where('id', Auth::id())->first();
        return view('admin.profile', compact('user'));
    }

    public function password_update(Request $request){
        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'oldpassword' => 'required|string',
            'password' => 'required','string','confirmed'
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with(['flash_message' =>'Something went wrong']);
        }
        if(Hash::check($request->oldpassword, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with(['flash_message' =>'Password changed successfully']);
        }
        else return redirect()->back()->withErrors(['oldpassword' => 'Your old password is wrong'])->with(['flash_message' =>'Something went wrong']);
    }

    public function setting(){
        abort_if(auth()->user()->role != 'admin',503,'Unauthorized Access');
        return view('admin.setting');
    }

    public function setting_manage(){

    }

    public function admins(){
        abort_if(auth()->user()->role != 'admin',503,'Unauthorized Access');
        $users = User::where('role','user')->paginate(10);
        return view('admin.users',compact('users'));
    }

    public function manage_admins(Request $request){
        abort_if(auth()->user()->role != 'admin',503,'Unauthorized Access');
        switch($request->action){
            case 'create':
                            $request->validate([
                                'name' => 'required',
                                'email' => 'required|unique:users',
                                'password' => 'required',
                            ]);
                            User::create(['name' => $request->name,'email' => $request->email,'role'=> 'user' ,'password' => Hash::make($request->password)]);
                            return redirect()->back()->with(['flash_message'=> 'Successfully Registered']);
                break;
            case 'update':  
                            $user = User::find($request->user_id);
                            $user->name = $request->name;
                            $user->email = $request->email;
                            $user->save();
                            return redirect()->back()->with(['flash_message'=> 'Successfully Updated']);
                break;
            case 'delete':
                            $user = User::find($request->user_id);
                            $user->delete();
                            return redirect()->back()->with(['flash_message'=> 'Successfully Deleted']);
                break;
        }
        
    }
    

   
}
