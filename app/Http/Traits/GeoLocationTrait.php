<?php
namespace App\Http\Traits;

use App\Models\State;
use App\Models\Country;
use Ixudra\Curl\Facades\Curl;

trait GeoLocationTrait
{
    protected function getCountryById($country_id){
        $country = Country::find($country_id);
        return $country;
    }

    protected function getStates($country_id){
        $country = $this->getCountryById($country_id);
        $states = State::with('country:id,name')->where('country_id',$country->id)->orderBy('name','asc')->get();
        if($states->isEmpty()){
            $this->fetchStates($country);
            $states = State::with('country:id,name')->where('country_id',$country->id)->orderBy('name','asc')->get();
        }
        return ['country'=> $country->name,'states'=>$states];
    }

    protected function fetchStates(Country $country){
        $responses = Curl::to("https://api.countrystatecity.in/v1/countries/$country->iso/states")
        ->withHeader('X-CSCAPI-KEY: '.config('services.countrystatecity'))
        ->asJson()
        ->get();
        foreach($responses as $response){
            $state = State::updateOrCreate(['iso'=> $response->iso2,'country_id'=> $country->id],['name'=> $response->name]);
        }
    }
    
}

