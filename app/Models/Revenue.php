<?php

namespace App\Models;

use App\Models\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Revenue extends Model
{
    use HasFactory;

    protected $fillable = ['payment_id','currency','amount'];

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
