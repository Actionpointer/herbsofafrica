<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Revenue extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['payment_id','currency','amount'];
    protected $casts = ['deleted_at'=> 'datetime'];
    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
