<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use App\Models\State;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rates = Rate::paginate(50);
        return view('admin.shipment.rates.list',compact('rates'));
        
    }

    public function create(){
        $countries = Country::all();
        $currencies = Currency::all();
        return view('admin.shipment.rates.create',compact('countries','currencies'));
    }

    public function edit(Rate $rate){
        $countries = Country::all();
        $states = State::whereIn('country_id',$rate->countries)->get();
        $currencies = Currency::all();
        return view('admin.shipment.rates.edit',compact('rate','countries','states','currencies'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'countries' => 'required',
            'states_mode' => 'required',
            'prices' => 'required_if:method,flat-rate',
            'percentage' => 'required_if:price_type,order-percentage',
            'warehouse' => 'required_if:method,local-pickup',
        ]);

        $rate = Rate::create([ "name" => $request->name, "countries" => $request->countries,
        "states"=> $request->states,
        "states_mode"=> $request->states_mode, 
        "method"=> $request->method, 
        "price_type"=> $request->price_type, 
        "percentage"=> $request->percentage,
        "prices"=> $request->prices,
        "warehouse"=> $request->warehouse]);
        return redirect()->route('admin.shipment.rates.index');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'rate_id' => 'required',
            'name' => 'required',
            'countries' => 'required',
            'states_mode' => 'required',
            'prices' => 'required_if:method,flat-rate',
            'percentage' => 'required_if:price_type,order-percentage',
            'warehouse' => 'required_if:method,local-pickup',
        ]);
        
        Rate::where('id',$request->rate_id)->update([ "name" => $request->name, "countries" => $request->countries,
        "states"=> $request->states,
        "states_mode"=> $request->states_mode, 
        "method"=> $request->method, 
        "price_type"=> $request->price_type, 
        "percentage"=> $request->percentage,
        "prices"=> $request->prices,
        "warehouse"=> $request->warehouse]);
        return redirect()->route('admin.shipment.rates.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $rate = Rate::find($request->rate_id);
        if($rate->shipments->isEmpty()){
            $rate->delete();
        }
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function packages()
    {
        $packages = Shipment::all();
        return view('admin.shipment.packages',compact('packages'));
    }

    
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    

    
}
