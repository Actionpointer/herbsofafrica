<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'user_id','quantity'];
    protected $appends = ['amount'];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function getAmountAttribute(){
        //return $this->course->prices[session('currency')['code']];
        return array_map(function ($value) {return $value * $this->quantity;},$this->product->prices);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
