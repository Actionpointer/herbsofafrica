<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Currency;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.order.index');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('user.order.view');
    }

    public function browse(){
        $orders = Order::all();
        $currencies = Currency::all();
        return view('admin.orders.list',compact('orders','currencies'));
    }
    public function read(Order $order){
        $currency = Currency::where('code',$order->currency)->first();
        return view('admin.orders.view',compact('order','currency'));
    }

    public function edit(Request $request)
    {
        switch($request->status){
            case 'ready':       Order::where('id',$request->order_id)->update(['ready_at'=> now()]);
                break;
            case 'shipped':     $order = Order::find($request->order_id);
                                if(!$order->ready_at) $order->ready_at = now();
                                $order->shipped_at = now();
                                $order->save();
                break;
            case 'delivered':   $order = Order::find($request->order_id);
                                if(!$order->ready_at) $order->ready_at = now();
                                if(!$order->shipped_at) $order->shipped_at = now();
                                $order->delivered_at = now();
                                $order->save();
                                $order->shipment->status = true;
                                $order->shipment->save();
                break;  
        }
        return redirect()->back();
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
