<?php

namespace App\Models;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Rate extends Model
{
    use HasFactory;

    protected $fillable = [ "name", "amount", "currency", "country", "state", "city"];

    public function shipments()
    {
        return $this->hasMany(Shipment::class);
    }
    
}
