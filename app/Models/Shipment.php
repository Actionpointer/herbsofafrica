<?php

namespace App\Models;

use App\Models\Rate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Shipment extends Model
{
    use HasFactory;

    protected $fillable = ['rate_id','order_id','firstname','lastname','email','phone','country','state','city','street','postcode','status'];

    public function rate(){
        return $this->belongsTo(Rate::class);
    }
}
