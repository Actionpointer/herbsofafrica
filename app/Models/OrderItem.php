<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'order_id', "product_id", "title", "images", 'category', 'currency', 'quantity', 'price',
    ];
}
