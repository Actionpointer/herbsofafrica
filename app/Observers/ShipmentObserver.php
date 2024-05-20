<?php

namespace App\Observers;

use App\Models\Address;
use App\Models\Shipment;

class ShipmentObserver
{
    
    public function created(Shipment $shipment): void
    {
        Address::updateOrCreate(['user_id'=> $shipment->order->user_id,'country_id'=> $shipment->country_id,
        'state_id'=> $shipment->state_id,'phone'=> $shipment->phone,'email'=> $shipment->email],
        ['city'=> $shipment->city, 'firstname'=> $shipment->firstname ,'lastname'=> $shipment->lastname,
        'street'=> $shipment->street,'postcode'=> $shipment->postcode]);
    }

    
    public function updated(Shipment $shipment): void
    {
        //
    }

    
    public function deleted(Shipment $shipment): void
    {
        //
    }

    
    public function restored(Shipment $shipment): void
    {
        //
    }

    
}
