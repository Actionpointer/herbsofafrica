<?php

namespace App\Http\Controllers;

use App\Http\Traits\PaymentTrait;
use App\Models\Order;
use App\Models\Currency;
use App\Models\Affiliate;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use PaymentTrait;

    public function __construct(){
        $this->middleware('auth')->only(['wishlist','addtowish','removefromwish']);
        if(request()->domain){
            $affiliate = Affiliate::where('username',request()->domain)->first();
            session(['affiliate'=> $affiliate]);
        }
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::where('user_id',auth()->id())->get();
        $currencies = Currency::all();
        return view('user.order.index',compact('orders','currencies'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $currency = Currency::where('code',$order->currency)->first();
        return view('user.order.view',compact('order','currency'));
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
            case 'cancelled':   $order = Order::find($request->order_id);
                                $order->cancelled_at = now();
                                $order->save();
                                $refund = $this->initializeRefund($order->payment);
                                if($refund){
                                    $order->refunded_at = now();
                                    $order->save();
                                }  
                break;
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
                                $order->shipping->status = true;
                                $order->shipping->save();
                break;  
            case 'disliked':    Order::where('id',$request->order_id)->update(['disliked_at'=> now()]);
                break;
            case 'refund':      $order = Order::find($request->order_id);
                                $refund = $this->initializeRefund($order->payment);
                                if($refund){
                                    $order->refunded_at = now();
                                    $order->save();
                                } 
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
