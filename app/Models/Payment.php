<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\OrderItem;
use App\Observers\PaymentObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "user_id", "reference","stripe_session_id", "currency", "amount", "coupon_id", "coupon_value", "vat", "shipment", "total", "status"
    ];

    public function getRouteKeyName()
    {
        return 'reference';
    }

    public static function boot(){
        parent::boot();
        parent::observe(new PaymentObserver);
    }
    
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
    public function shipping(){
        return $this->hasOneThrough(Shipment::class,Order::class);
    }

    public function items(){
        return $this->hasManyThrough(OrderItem::class,Order::class);
    }
}
