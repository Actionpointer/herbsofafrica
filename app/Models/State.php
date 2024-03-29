<?php

namespace App\Models;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['country_id','iso','name'];
    
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
