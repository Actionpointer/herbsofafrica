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
        'cancelled_at'=> 'datetime',
        'shipped_at'=> 'datetime',
        'delivered_at'=> 'datetime',
    ];

    public function getStatusAttribute(){
        if($this->delivered_at)
        return 'delivered';
        elseif($this->shipped_at)
        return 'shipped';
        elseif($this->ready_at)
        return 'ready';
        elseif($this->cancelled_at)
        return 'cancelled';
        elseif($this->payment->status == 'success') 
        return 'processing';
        else return 'unpaid';
    }

    public function getStatusTimeAttribute(){
        if($this->delivered_at)
        return $this->delivered_at->format('jS F Y');
        elseif($this->shipped_at)
        return $this->shipped_at->format('jS F Y');
        elseif($this->ready_at)
        return $this->ready_at->format('jS F Y');
        elseif($this->cancelled_at)
        return $this->cancelled_at->format('jS F Y');
        else return $this->created_at->format('jS F Y');
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function items(){
        return $this->hasMany(OrderItem::class);
    }

    public function shipping(){
        return $this->hasOne(Shipment::class);
    }


}

