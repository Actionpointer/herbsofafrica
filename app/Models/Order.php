<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use App\Models\Shipment;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'payment_id','affiliate_id', 'currency', 'total',"note",  "ready_at","shipped_at", "delivered_at"];

    protected $casts = [
        'ready_at'=> 'datetime',
        'shipped_at'=> 'datetime',
        'delivered_at'=> 'datetime',
    ];

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->hasMany(OrderItem::class);
    }

    public function shipment(){
        return $this->hasOne(Shipment::class);
    }


}

