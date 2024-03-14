<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\Payment;
use App\Models\Shipment;
use App\Models\Affiliate;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Traits\OrderTrait;
use App\Http\Traits\PaymentTrait;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    use PaymentTrait,OrderTrait;
    
    public function __construct(){
        $this->middleware('auth');
        if(request()->domain){
            $affiliate = Affiliate::where('username',request()->domain)->first();
            session(['affiliate'=> $affiliate]);
        }
    }

    public function store(Request $request){
        $carts = session('carts');
        $coupon = $this->getCoupon($request->coupon);
        $payment = Payment::create(['user_id'=> auth()->id(),"reference" => uniqid(),
        'currency'=> session('currency')['code'], "amount"=> $carts->sum('amount.'.session('currency')['code']), 
        "coupon_id"=> $coupon['id'], "coupon_value"=> $coupon['value'], "shipment"=> $request->shipment, "total"=> $request->total]);
        $order = Order::create(['user_id'=> auth()->id(), 'payment_id'=> $payment->id, 'currency'=> session('currency')['code'], 'total'=> $carts->sum('amount.'.session('currency')['code']), 'affiliate_id'=> $request->affiliate_id, "note" => $request->note]);
        $this->createOrderItems($order->id); 
        $this->createShipment($request,$order->id);
        $response = $this->initializePayment($payment);
        if (!$response){
            Alert::toast('Service Unavailable, Please Try Again Shortly', 'error');
            return redirect()->back();
        }
        else return redirect()->to($response);
    }

    public function retry(Payment $payment){
        
        $response = $this->initializePayment($payment);
        if (!$response){
            Alert::toast('Service Unavailable, Please Try Again Shortly', 'error');
            return redirect()->back();
        }
        else return redirect()->to($response);
    }

    

    protected function createShipment(Request $request,$order_id){
        Shipment::create(['rate_id'=> $request->shipping_rate,'order_id'=> $order_id,
        'firstname'=> $request->firstname ,'lastname'=> $request->lastname,'email'=> $request->email,
        'phone'=> $request->phone,'country_id'=> $request->country,'state_id'=> $request->state,
        'city'=> $request->city,'street'=> $request->street,'postcode'=> $request->postcode]);
    }


    public function callback(){ 
        if(!request()->query('tx_ref')) \abort(404);
        if(request()->query('status') != 'successful'){
            Alert::toast('Payment was not successful. Please try again', 'error');
            return redirect()->route('payment.response',['status'=> 'failed']);
        }
        $reference = request()->query('tx_ref');
        $payment = Payment::where('reference',$reference)->first();
        if(!$payment){
            Alert::toast('Something went wrong. Please try again', 'error');
            return redirect()->route('payment.response',['status'=> 'failed']);
        }
        if($payment->status == 'success'){
            Alert::toast('Payment was successful', 'success');
            return redirect()->route('payment.response',['status'=> 'success']);
        }
        if($payment->currency == 'NGN'){
            $details = $this->verifyFlutterWavePayment($payment->reference);
            if(!$details || !$details->status || $details->status != 'success' || !$details->data || $details->data->status != 'successful' || $details->data->amount < $payment->amount){
                Alert::toast('Payment was not successful. Please try again', 'error');
                return redirect()->route('payment.response',['status'=> 'failed']);
            }
        }else{
            $details = $this->verifyStripePayment($payment->stripe_session_id);
            if(!$details || !$details->status || $details->status != 'complete' || $details->amount_total/100 < $payment->total){
                Alert::toast('Payment was not successful. Please try again', 'error');
                return redirect()->route('payment.response',['status'=> 'failed']);
            }
            
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
