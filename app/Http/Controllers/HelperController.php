<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\State;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Traits\GeoLocationTrait;
use App\Http\Traits\OrderTrait;
use App\Http\Traits\PaystackTrait;

class HelperController extends Controller
{
    use GeoLocationTrait,PaystackTrait, OrderTrait;

    public function switch_currency(){
        $currency = Currency::where('code',request()->currency)->first();
        session(['currency'=> ['code'=> $currency->code,'symbol'=> $currency->symbol]]);
        return response()->json(200);
    }

    public function getCountryStates(Request $request){
        $states = [];
        if(is_array($request->countries)){
            foreach($request->countries as $country){
                $states[] = $this->getStates($country);
            }
            
        }else{
            $states[] = $this->getStates($request->countries);
        }
        return $states;
        
    }

    public function getShipmentRates(Request $request){
        $state = State::find($request->state);
        $country = $state->country;
        $include = Rate::whereJsonContains('countries',"$country->id")->whereJsonContains('states',"$state->id")->where('states_mode','include')->get();
        $exclude = Rate::whereJsonContains('countries',"$country->id")->whereJsonDoesntContain('states',"$state->id")->where('states_mode','exclude')->get();
        $rates = $include->merge($exclude);
        return $rates;
    }

    public function applyCoupon(Request $request){
        $coupon = $this->getCoupon($request->coupon);
        return response()->json($coupon,200);
    }


    public function verify_account(Request $request){
        $response = $this->resolveBankAccountByPaystack($request->bank_code,$request->account_number);
        return response()->json(
            ['message' => $response ? 'Account fetched Successfully':'Unable to verify bank account',
            'name' => $response
            ],200);
        
    }
}
