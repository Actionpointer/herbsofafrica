<?php

namespace App\Models;

use App\Models\Cart;
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
}
