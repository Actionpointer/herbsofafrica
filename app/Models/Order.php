<?php

namespace App\Models;

use App\Models\User;
use App\Models\Review;
use App\Models\Payment;
use App\Models\Shipment;
use App\Models\OrderItem;
use App\Observers\OrderObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['user_id','reference', 'payment_id', 'currency', 'total',"note",  "ready_at","shipped_at", "delivered_at","disliked_at","refunded_at"];

    protected $casts = [
        'ready_at'=> 'datetime',
        'cancelled_at'=> 'datetime',
        'shipped_at'=> 'datetime',
        'delivered_at'=> 'datetime',
        'disliked_at'=> 'datetime',
        'refunded_at'=> 'datetime',
        'deleted_at'=> 'datetime',
    ];

    public static function boot(){
        parent::boot();
        parent::observe(new OrderObserver);
    }

    public function getRouteKeyName()
    {
        return 'reference';
    }

    public function getStatusAttribute(){
        if($this->refunded_at)
        return 'refunded';
        if($this->disliked_at)
        return 'disliked';
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
        if($this->refunded_at)
        return $this->refunded_at->format('jS F Y');
        if($this->disliked_at)
        return $this->disliked_at->format('jS F Y');
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

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function getReviewableAttribute(){
        $review = false;
        foreach($this->items as $item){
            if($item->product->reviews->where('user_id',$this->user_id)->isEmpty()){
                $review = true;
                break;
            }
        }
        return $review;
    }


}

