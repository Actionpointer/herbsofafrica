<?php

namespace App\Http\Controllers;

use Log;
use Response;
use Exception;
use App\Models\Setting;
use App\Models\Currency;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    

    public function index(){
        abort_if(auth()->user()->role != 'admin',503,'Unauthorized Access');
        $currencies = Currency::all();
        $settings = Setting::all();
        return view('admin.settings',compact('currencies','settings'));
    }

    public function currencies(Request $request){
        abort_if(auth()->user()->role != 'admin',503,'Unauthorized Access');
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

    public function counters(Request $request){
        abort_if(auth()->user()->role != 'admin',503,'Unauthorized Access');
        foreach($request->except('_token') as $key => $value){
            Setting::where('name',$key)->update(['value'=> $value]);
        }
        return redirect()->back();
    }

    
}
