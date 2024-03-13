<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Affiliate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = ['affiliate_id','code','start_at','end_at','minimum','percentage','limit_per_user','status'];

    public function payments(){
        return $this->hasMany(Payment::class);
    }

    public function affiliate(){
        return $this->belongsTo(Affiliate::class);
    }
}
