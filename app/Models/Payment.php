<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id", "reference", "currency", "amount", "coupon_id", "coupon_value", "vat", "shipment", "total", "status"
    ];
    
    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->hasOne(Order::class);
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }
}
