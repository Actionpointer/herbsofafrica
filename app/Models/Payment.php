<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\User;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\Affiliate;
use App\Models\OrderItem;
use App\Models\Settlement;
use App\Http\Traits\OrderTrait;
use App\Observers\PaymentObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory,OrderTrait;
    
    protected $fillable = [
        "user_id","affiliate_id", "reference","stripe_session_id", "currency", "amount", "coupon_id", "coupon_value", "vat", "shipment", "total", "status"
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

    public function settlement(){
        return $this->hasOne(Settlement::class);
    }

    public function coupon(){
        return $this->belongsTo(Coupon::class);
    }

    public function affiliate(){
        return $this->belongsTo(Affiliate::class);
    }

    public function shipping(){
        return $this->hasOneThrough(Shipment::class,Order::class);
    }

    public function items(){
        return $this->hasManyThrough(OrderItem::class,Order::class);
    }

    public function getCommissionAttribute(){
        if($this->affiliate_id || ($this->user->payments->count() <= 1 && $this->user->referred_id)){
            $affiliate = $this->affiliate ?? $this->user->referrer;
            if($this->commission_currency == 'NGN'){
                $amount = $this->getOrderSubtotal($this->order,'NGN');
                $coupon_value = $this->coupon_value ? $this->coupon->percentage * $amount : 0;
            }else{
                $amount = $this->amount;
                $coupon_value = $this->coupon_value;
            }
            $commission_percent = $affiliate->percentage * $amount / 100;
            $commission = $commission_percent - $coupon_value;
            return $commission;
        }else return 0;
        
    }

    public function getCommissionCurrencyAttribute(){
        if($this->affiliate_id && $this->affiliate->currency == 'NGN') return 'NGN';
        else return $this->currency; 
    }

    public function getRevenueAmountAttribute(){
        if($this->affiliate_id){
            if($this->commission_currency == 'NGN' && $this->currency != 'NGN'){
                return $this->amount;
            }else{
                return $this->amount - ($this->commission + $this->coupon_value);
            }
        }else return $this->amount;
    }
}
