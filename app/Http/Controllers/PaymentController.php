<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\Shipment;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Traits\OrderTrait;
use App\Http\Traits\PaymentTrait;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    use PaymentTrait,OrderTrait;
    
    public function index(){
        $orders = Payment::orderBy('created_at','desc')->get();
        return view('admin.orders.list',compact('orders'));
    }

    public function store(Request $request){

        $carts = session('carts');
        $coupon = $this->obtainCouponValue($request->coupon);
        $payment = Payment::create(['user_id'=> auth()->id(),"reference" => uniqid(),'currency'=> session('currency')['code'], "amount"=> $carts->sum('amount.'.session('currency')['code']), "coupon_id"=> $coupon['id'], "coupon_value"=> $coupon['value'], "vat", "shipment", "total", "status"]);
        $order = Order::create(['user_id'=> auth()->id(), 'payment_id'=> $payment->id, 'currency'=> session('currency')['code'], 'total'=> $carts->sum('amount.'.session('currency')['code']), 'affiliate_order'=> auth()->user()->referrer_id ? $carts->sum('amount.'.auth()->user()->referrer->currency) : 0, "note" => $request->note]);
        $this->createOrderItems($order->id); 
        $this->createShipment($request,$order->id);
        dd('ready');
        $response = $this->initializePayment($payment);
        if (!$response){
            Alert::toast('Service Unavailable, Please Try Again Shortly', 'error');
            return redirect()->back();
        }
        else return redirect()->to($response);
    }

    protected function obtainCouponValue($code = null){
        $carts = session('carts');
        $coupon_id = null;
        $coupon_value = 0;
        if($code){
            $coupon_value = $this->getCoupon($code,$carts->sum('amount.'.session('currency')['code']))['value'];
            $coupon_id = Coupon::where('code',$code)->first()->id;
        }
        return ['id'=> $coupon_id,'value'=> $coupon_value];
    }

    protected function createOrderItems($order_id){
        $carts = session('carts');
        foreach($carts as $cart){            
            OrderItem::create(['user_id'=> auth()->id(), 
            'order_id'=> $order_id, "product_id"=> $cart['product_id'], "title"=> $cart['title'], 
            "images"=> $cart['images'], 'category'=> $cart['category'], 'currency'=> session('currency')['code'], 'quantity'=> $cart['quantity'], 
            'price'=> $cart['prices'][session('currency')['code']]]);
        }
        
    }

    protected function createShipment(Request $request,$order_id){
        Shipment::create(['rate_id'=> $request->rate_id,'order_id'=> $order_id,
        'firstname'=> $request->firstname ,'lastname'=> $request->lastname,'email'=> $request->email,
        'phone'=> $request->phone,'country'=> $request->country,'state'=> $request->state,
        'city'=> $request->city,'street'=> $request->street,'postcode'=> $request->postcode]);
    }


    public function callback(){ 
        dd(request()->query());
        if(!request()->query('reference') && !request()->query('tx_ref')) \abort(404);
        $reference = request()->query('reference') ?? request()->query('tx_ref');
        $payment = Payment::where('reference',$reference)->first();
        if(!$payment){
            Alert::toast('Something went wrong. Please try again', 'error');
            return redirect()->route('payment.response',['status'=> 'failed']);
        }
        if($payment->status == 'success'){
            Alert::toast('Payment was successful', 'success');
            return redirect()->route('payment.response',['status'=> 'success']);
        }
        if($payment->currency->code == 'USD'){
            $details = $this->verifyPaystackPayment($payment->reference);
            if(!$details || !$details->status || !$details->data || $details->data->status != 'success' || $details->data->amount/100 < $payment->amount){
                Alert::toast('Payment was not successful. Please try again', 'error');
                return redirect()->route('payment.response',['status'=> 'failed']);
            }
            $payment->method = $details->data->channel;
        }else{
            if(request()->query('status') != 'successful'){
                Alert::toast('Payment was not successful. Please try again', 'error');
                return redirect()->route('payment.response',['status'=> 'failed']);
            }
            $details = $this->verifyFlutterWavePayment($payment->reference);
            if(!$details || !$details->status || $details->status != 'success' || !$details->data || $details->data->status != 'successful' || $details->data->amount < $payment->amount){
                Alert::toast('Payment was not successful. Please try again', 'error');
                return redirect()->route('payment.response',['status'=> 'failed']);
            }
            $payment->method = $details->data->payment_type;
        }
        $payment->status = 'success';
        $payment->save();
        Alert::toast('Payment Successful', 'success');
        return redirect()->route('payment.response',['status'=> 'success']);
       
    }

    public function response(){
        $status = request()->status;
        if(!$status) \abort(404);  
        return view('webpages.payment.success',compact('status'));
    }

    
}
