<?php

namespace App\Models;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Rate extends Model
{
    use HasFactory;

    protected $fillable = [ "name", "countries","states","states_mode", "method", "price_type", "percentage","prices","warehouse"];
    protected $casts = ['countries'=> 'array','states'=> 'array','prices'=>'array'];

    public function getCountryNamesAttribute(){
        return implode(',',Country::whereIn('id',$this->countries)->get()->pluck('name')->toArray());
    }
    public function getStatesCountAttribute(){
        if($this->states_mode == 'include')
            return count($this->states);
        else
            return State::whereIn('country_id',$this->countries)->whereNotIn('id',$this->states)->count();
    }

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }
    
}
