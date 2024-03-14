<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Affiliate;
use App\Observers\SettlementObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Settlement extends Model
{
    use HasFactory;

    protected $fillable = ['affiliate_id','reference','transfer_id','payment_id','order_id','description','amount','currency','status','paid_at'];
    protected $casts = ['paid_at'=> 'array'];
    public static function boot(){
        parent::boot();
        parent::observe(new SettlementObserver);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function affiliate(){
        return $this->belongsTo(Affiliate::class);
    } 

    public function scopeCurrency($query,$value){
        return $query->where('currency',$value);
         
    }
}
