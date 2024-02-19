<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Affiliate extends Model
{
    use HasFactory;

    protected $fillable = ['email','username','phone','user_id','currency','country_id','bank_code','bank_name','account_number','balance','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        return $this->hasManyThrough(
            Order::class,
            User::class,
            'referrer_id', // Foreign key on the users table...
            'user_id', // Foreign key on the orders table...
            'id', // Local key on the affiliate table...
            'id' // Local key on the users table...
        );
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
