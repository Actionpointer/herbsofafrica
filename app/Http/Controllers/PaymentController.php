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
        $payment = Payment::create(['user_id'=> auth()->id(),"reference" => uniqid(), 'affiliate_id'=> $request->affiliate_id,
        'currency'=> session('currency')['code'], "amount"=> $carts->sum('amount.'.session('currency')['code']), 
        "coupon_id"=> $coupon['id'], "coupon_value"=> $coupon['value'], "shipment"=> $request->shipment, "total"=> $request->total]);
        $order = Order::create(['reference'=> $payment->reference,'user_id'=> auth()->id(), 'payment_id'=> $payment->id, 'currency'=> session('currency')['code'], 'total'=> $carts->sum('amount.'.session('currency')['code']), "note" => $request->note]);
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
        $reference = request()->query('tx_ref');
        $payment = Payment::where('reference',$reference)->first();
        abort_if(!$payment,503,'Payment does not exist');
        if($payment->status == 'success'){
            return redirect()->route('payment.confirmation',$payment);
        }
        if(request()->query('status') == 'cancelled'){
            $payment->status = 'cancelled';
            $payment->save();
            return redirect()->route('payment.confirmation',$payment);
        }
        
        if($payment->currency == 'NGN'){
            $details = $this->verifyFlutterWavePayment($payment->reference);
            if(!$details || !$details->status || $details->status != 'success' || !$details->data || $details->data->status != 'successful' || $details->data->amount < $payment->amount){
                $payment->status = 'failed';
                $payment->save();
                return redirect()->route('payment.confirmation',$payment);
            }
        }else{
            $details = $this->verifyStripePayment($payment->stripe_session_id);
            if(!$details || !$details->status || $details->status != 'complete' || $details->amount_total/100 < $payment->total){
                $payment->status = 'failed';
                $payment->save();
                return redirect()->route('payment.confirmation',$payment);
            } 
        }
        $payment->status = 'success';
        $payment->save();
        return redirect()->route('payment.confirmation',$payment);
    }

    public function response(){
        $status = request()->status;
        if(!$status) \abort(404);  
        return view('webpages.payment.success',compact('status'));
    }

    
}
