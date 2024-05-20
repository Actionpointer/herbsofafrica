<?php

namespace App\Models;

use App\Models\User;
use App\Models\State;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = ['user_id','country_id','state_id','city','street','postcode','email','phone','firstname','lastname','default'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['street','city']
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function getNameAttribute(){
        return ucwords($this->firstname).' '.ucwords($this->lastname);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function state(){
        return $this->belongsTo(State::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }

}
