<?php

namespace App\Models;

use App\Models\User;
use App\Models\Coupon;
use App\Models\Country;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Affiliate extends Model
{
    use HasFactory;

    protected $fillable = ['email','name','username','phone','user_id','currency','country_id','bank_code','bank_name','account_number','balance','status','percentage'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function customers(){
        return $this->hasMany(User::class,'referrer_id');
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function coupons(){
        return $this->hasMany(Coupon::class);
    }

    
}
