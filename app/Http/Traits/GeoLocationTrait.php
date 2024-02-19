<?php
namespace App\Http\Traits;

use App\Models\State;
use App\Models\Country;
use Ixudra\Curl\Facades\Curl;

trait GeoLocationTrait
{
    protected function getCountryByIso($iso){
        $country = Country::where('iso',$iso)->first();
        return $country;
    }

    protected function getStates($country_iso){
        $country = $this->getCountryByIso($country_iso);
        $states = State::where('country_id',$country->id)->orderBy('name','asc')->get();
        if($states->isEmpty()){
            $this->fetchStates($country);
            $states = State::where('country_id',$country->id)->orderBy('name','asc')->get();
        }
        return $states;
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

