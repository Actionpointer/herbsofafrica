<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillables = [ 'user_id', 'payment_id', 'currency', 'total','affiliate_order',"note",  "ready_at","shipped_at", "delivered_at"];

}

