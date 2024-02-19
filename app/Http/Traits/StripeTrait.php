<?php
namespace App\Http\Traits;

use App\Models\Payout;
use App\Models\Payment;
use App\Models\Affiliate;
use Ixudra\Curl\Facades\Curl;


trait StripeTrait
{

    public function initiateStripe(Payment $payment){
        $response = Curl::to('https://api.stripe.com/v1/checkout/sessions')
            ->withHeader('Content-Type: application/x-www-form-urlencoded')
            ->withHeader('Authorization: Bearer '.config('services.stripe.secret'))
            ->withData( array('customer_email' => 'magreat@gmail.com','currency'=> 'usd',
                            'success_url'=> 'http://herbsofafrica.test/success',
                            'client_reference_id'=> uniqid(),'mode'=> 'payment',
                            'line_items' => [
                                [ 
                                    'price_data' => [ 'currency' => 'usd', 'unit_amount' => 2000, 
                                                        'product_data' => [ 'name' => 'T-shirt',  'description' => 'Comfortable cotton t-shirt',
                                                                            'images' => ['https://store.nytimes.com/cdn/shop/products/mens-1619-shirt-back_1024x1024.jpg'] 
                                                        ],
                                    ], 'quantity' => 2, 
                                ],
                                [ 
                                    'price_data' => [ 'currency' => 'usd', 'unit_amount' => 50000, 
                                                        'product_data' => [ 'name' => 'Navy Blue Suit',  'description' => 'Bankers Suits for formal wears',
                                                                            'images' => ['https://dege-skinner.co.uk/wp-content/uploads/2020/12/navyblue400x400.jpg'] 
                                                        ],
                                    ], 'quantity' => 1, 
                                ],
                            ],
                            ) )
            ->asJsonResponse()
            ->post();
        dd($response);
        if($response && $response->url){
            $payment->reference = $response->id;
            $payment->save();
            return $response->data->url;
        }
            
        else return false;

          
      }
  
      protected function verifyStripePayment($reference){
        $response = Curl::to('https://api.stripe.com/v1/checkout/sessions/'.$reference)
            ->withHeader('Content-Type: application/x-www-form-urlencoded')
            ->withHeader('Authorization: Bearer '.config('services.stripe.secret'))
            ->asJsonResponse()
            ->get();
        dd($response);
        return ;
    }
  
    public function connectStripe(Affiliate $affiliate){
        $response = Curl::to('https://api.stripe.com/v1/accounts')
            ->withHeader('Content-Type: application/x-www-form-urlencoded')
            ->withHeader('Authorization: Bearer '.config('services.stripe.secret'))
            ->withData( array('type'=> 'express','country'=> $affiliate->country->iso ,'email' => $affiliate->email))
            ->asJsonResponse()
            ->get();
        // dd($response);
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
            ->withData( array('account'=> $affiliate->account_number,'refresh_url'=> route('affiliate.connect.stripe') ,'return_url' => route('affiliate.index')))
            ->asJsonResponse()
            ->get();
        if($response && $response->url){
            return $response->url;
        }else return false;
    }


    

    


}