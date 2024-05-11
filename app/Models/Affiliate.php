<?php

namespace App\Models;

use App\Models\User;
use App\Models\Coupon;
use App\Models\Country;
use App\Models\Payment;
use App\Models\Settlement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Affiliate extends Model
{
    use HasFactory,Sluggable,Notifiable;

    protected $fillable = ['email','name','username','phone','user_id','country_id','account_status','account_number','balance','status','percentage'];

    public function sluggable(): array
    {
        return [
            'username' => [
                'source' => 'name'
            ]
        ];
    }

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

    public function settlements(){
        return $this->hasMany(Settlement::class);
    }

    
}
