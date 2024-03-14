<?php

namespace App\Models;

use App\Models\Rate;
use App\Models\Order;
use App\Models\State;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Shipment extends Model
{
    use HasFactory;

    protected $fillable = ['rate_id','order_id','firstname','lastname','email','phone','country_id','state_id','city','street','postcode','status'];

    public function rate(){
        return $this->belongsTo(Rate::class);
    }

    public function getNameAttribute(){
        return ucwords($this->firstname).' '.ucwords($this->lastname);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
    
    public function state(){
        return $this->belongsTo(State::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
