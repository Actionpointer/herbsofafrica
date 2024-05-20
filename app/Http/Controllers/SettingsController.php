<?php

namespace App\Http\Controllers;

use Log;
use Response;
use Exception;
use App\Models\User;
use App\Models\Setting;
use App\Models\Currency;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    
    public function index(){ 
        $currencies = Currency::all();
        $settings = Setting::all();
        $staffs = User::where('role','!=',null)->get();
        return view('admin.settings',compact('currencies','settings','staffs'));
    }

    public function currencies(Request $request){
        
        switch($request->action){
            case 'create':
                            $request->validate([
                                'name'=> 'required',
                                'symbol' => 'required',
                                'code' => 'required',
                            ]);
                            Currency::create([
                                'name' => $request->name,
                                'symbol' => $request->symbol,
                                'code' => strtoupper($request->code),
                            ]);
                            return redirect()->back()->with(['flash_message'=> 'Successfully Created']);
                break;
            case 'update':  
                            Currency::where('id',$request->currency_id)->update([
                                'name' => $request->name,
                                'symbol' => $request->symbol,
                                'code' => strtoupper($request->code),
                            ]);
                            return redirect()->back()->with(['flash_message'=> 'Successfully Updated']);
                break;
            case 'delete':
                            $currency = Currency::find($request->currency_id);
                            $currency->delete();
                            return redirect()->back()->with(['flash_message'=> 'Successfully Deleted']);
                break;
        }
    }

    public function update(Request $request){  
        foreach($request->except('_token') as $key => $value){
            Setting::where('name',$key)->update(['value'=> $value]);
        }
        return redirect()->back();
    }

    
}
