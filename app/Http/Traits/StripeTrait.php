<?php
namespace App\Http\Traits;

use App\Models\Payout;
use App\Models\Payment;
use App\Models\Affiliate;
use App\Models\Settlement;
use Ixudra\Curl\Facades\Curl;


trait StripeTrait
{

    public function initiateStripe(Payment $payment){
        $items = [];
        $items[] = [  'price_data' => 
                                [ 'currency' => strtolower(session('currency')['code']), 'unit_amount' => $payment->shipment *100, 
                                'product_data' => [ 'name' => 'Shipment',  'description' => $payment->order->shipping->rate->name,'images' => [] ],
                                ], 
                                'quantity' => 1, 
                            ];
        
        foreach($payment->order->items as $item){
            $amount = $payment->coupon_value ? $payment->coupon->percentage * $item->price : $item->price * 100;
            $items[] = [  'price_data' => 
                            [ 'currency' => strtolower(session('currency')['code']), 'unit_amount' => $amount , 
                            'product_data' => [ 'name' => $item->title,  'description' => $item->product->tagline,'images' => $item->images ],
                            ], 
                            'quantity' => $item->quantity, 
                        ];
        }
        $response = Curl::to('https://api.stripe.com/v1/checkout/sessions')
            ->withHeader('Content-Type: application/x-www-form-urlencoded')
            ->withHeader('Authorization: Bearer '.config('services.stripe.secret'))
            ->withData( array('customer_email' => 'magreat@gmail.com','currency'=> 'usd',
                            'success_url'=> route('payment.callback',with(['tx_ref'=> $payment->reference,'status'=> 'successful'])),
                            'cancel_url'=> route('payment.callback',with(['tx_ref'=> $payment->reference,'status'=> 'cancelled'])),
                            'client_reference_id'=> uniqid(),'mode'=> 'payment',
                            'line_items' => $items
                            ) )
            ->asJsonResponse()
            ->post();
        if($response && $response->url){
            $payment->stripe_session_id = $response->id;
            $payment->save();
            return $response->url;
        }
            
        else return false;
      }
  
      protected function verifyStripePayment($stripe_session_id){
        $response = Curl::to('https://api.stripe.com/v1/checkout/sessions/'.$stripe_session_id)
            ->withHeader('Content-Type: application/x-www-form-urlencoded')
            ->withHeader('Authorization: Bearer '.config('services.stripe.secret'))
            ->asJsonResponse()
            ->get();
        return $response;
    }
  
    public function connectStripe(Affiliate $affiliate){
        $response = Curl::to('https://api.stripe.com/v1/accounts')
            ->withHeader('Content-Type: application/x-www-form-urlencoded')
            ->withHeader('Authorization: Bearer '.config('services.stripe.secret'))
            ->withData( array('type'=> 'express','country'=> $affiliate->country->iso ,'email' => $affiliate->email))
            ->asJsonResponse()
            ->post();
        // acct_1OpTfgGgPcnGNIQ2
        if($response && $response->id){
            $affiliate->bank_name = 'stripe';
            $affiliate->account_number = $response->id;
            $affiliate->save();
            return true;
        }else return false;
    }

    public function accountLink(Affiliate $affiliate){
        $response = Curl::to('https://api.stripe.com/v1/account_links')
            ->withHeader('Content-Type: application/x-www-form-urlencoded')
            ->withHeader('Authorization: Bearer '.config('services.stripe.secret'))
            ->withData( array('account'=> $affiliate->account_number,'type'=> 'account_onboarding',
            'refresh_url'=> route('affiliate.connect.stripe') ,'return_url' => route('affiliate.index')))
            ->asJsonResponse()
            ->post();
        if($response && $response->url){
            return $response->url;
        }else return false;
    }

    public function payoutStripe(Settlement $settlement){
        $response = Curl::to('https://api.stripe.com/v1/payouts')
            ->withHeader('Content-Type: application/x-www-form-urlencoded')
            ->withHeader('Authorization: Bearer '.config('services.stripe.secret'))
            ->withData( array('amount'=> $settlement->amount * 100,'currency'=> $settlement->currency ,'destination'=> $settlement->affiliate->account_number))
            ->asJsonResponse()
            ->post();
        dd($response);
        if($response && $response->status && $response->status == 'pending'){
            $settlement->transfer_id = $response->id; 
            $settlement->status = 'processing'; 
            $settlement->save();
        }else {
            $settlement->transfer_id = $response->id ?? '';
            $settlement->status = 'failed';
            $settlement->save();
        }
    }

    public function verifyPayoutStripe(Settlement $settlement){
        $response = Curl::to("https://api.stripe.com/v1/payouts/$settlement->transfer_id")
            ->withHeader('Content-Type: application/x-www-form-urlencoded')
            ->withHeader('Authorization: Bearer '.config('services.stripe.secret'))
            ->asJsonResponse()
            ->get(); 
            if($response && $response->status && $response->status == 'success'){
                $settlement->status = 'paid';
                $settlement->paid_at = now();
                $settlement->save();
            }
    }


}