<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Address;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Resources\AddressResource;

class AddressController extends Controller
{

    public function __construct(){
        $this->middleware('auth:sanctum');
    }
    
    public function index(){
        $user = auth()->user();
        return view('user.addressbook.index',compact('user'));
    }

    public function create(){
        $user = auth()->user();
        $countries = Country::all();
        return view('user.addressbook.create',compact('user','countries'));
    }
    
    public function store(Request $request){
        $default = 0;
        if($request->default){
            Address::where('user_id',auth()->id())->update(['default'=> 0]);
            $default = 1;
        }
        Address::create(['user_id'=> auth()->id(),'country_id'=> $request->country_id,'state_id'=> $request->state_id,'city'=> $request->city,'street' => $request->street,'email'=> $request->email,'phone' => $request->phone,'firstname' => $request->firstname,'lastname' => $request->lastname,'postcode'=> $request->postcode,'default' => $default]);
        return redirect()->route('address.index');
    }

    public function edit(Address $address){
        $countries = Country::all();
        $states = State::where('country_id',$address->country_id)->get();
        return view('user.addressbook.edit',compact('address','countries','states'));
    }


    public function update(Request $request){
       // dd($request->all());
        $default = 0;
        if($request->default){
            Address::where('user_id',auth()->id())->update(['default'=> 0]);
            $default = 1;
        }
        $address = Address::where('id',$request->address_id)->update(['country_id'=> $request->country_id,'state_id'=> $request->state_id,'city'=> $request->city,'street' => $request->street,'email'=> $request->email,'phone' => $request->phone,'firstname' => $request->firstname,'lastname' => $request->lastname,'postcode'=> $request->postcode,'default' => $default]);
        return redirect()->route('address.index');
    }

    public function destroy(Request $request){
        Address::where('id',$request->address_id)->delete();
        $addresses = Address::where('user_id',auth()->id())->get();
        if($addresses->isNotEmpty() && $addresses->where('default',true)->isEmpty()){
            $addresses->first()->main = true;
            $addresses->first()->save();
        }
        return redirect()->route('address.index');
    }

}
