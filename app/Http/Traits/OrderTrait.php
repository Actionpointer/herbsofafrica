<?php
namespace App\Http\Traits;


use App\Models\Coupon;

use App\Models\Payment;
use App\Models\OrderItem;

trait OrderTrait
{

    protected function getOrder($carts = null){
        $user = auth()->user();
        $cart = isset($carts) ? $carts->toArray() : session('carts');
        if(!$cart)
        $order = ['subtotal'=> 0,'vat'=> 0,'vat_percent'=> $user->country->vat,'shipping'=> 0];
        else
        $order = ['subtotal'=> $this->getSubtotal($cart),'vat'=> $user->country->vat/100 * $this->getSubtotal($cart),
        'vat_percent'=> $user->country->vat,'shipping'=> $this->getEachShipment($cart)['total']];
        $grandtotal = $order['subtotal'] + $order['vat'] + $order['shipping'];
        $order['grandtotal'] = $grandtotal;
        return $order;
    }

    protected function getSubtotal(Array $cart){
        // dd($cart);
        $subtotal = 0; 
        foreach($cart as $item){
            $subtotal += $item['quantity'] * $item['amount'];
        }
        return $subtotal;
    }

    
    protected function createOrderItems($order_id){
        $carts = session('carts');
        foreach($carts as $cart){            
            
            OrderItem::create([
                'user_id'=> auth()->id(),  'order_id'=> $order_id, "product_id"=> $cart['product_id'], 
                "title"=> $cart['title'],  "images"=> $cart['images'], 'category'=> $cart['category'], 
                'currency'=> session('currency')['code'], 'quantity'=> $cart['quantity'], 
                'price'=> $cart['prices'][ session('currency')['code'] ]
            ]);
        }
        
    }
    
    
    protected function getCoupon($code){
        $coupon = Coupon::where('code',$code)->first();
        $carts = session('carts');
        $amount = $carts->sum('amount.'.session('currency')['code']);
        if(!$coupon)
            return ['id'=> null,'description'=> 'Coupon does not exist','value'=> 0];
        if(!$coupon->status)
            return ['id'=> $coupon->id,'description'=> 'Coupon is invalid','value'=> 0];
        
        if($coupon->start_at && $coupon->start_at > now())
            return ['id'=> $coupon->id,'description'=> 'Coupon is not available','value'=> 0];
        if($coupon->end_at && $coupon->end_at < now())
            return ['id'=> $coupon->id,'description'=> 'Coupon is expired','value'=> 0];
        if($coupon->minimum_spend && $coupon->minimum_spend > $amount){
            return ['id'=> $coupon->id,'description'=> "Your subtotal must be greater than $coupon->minimum_spend to avail this coupon",'value'=> 0]; 
        }
        
        // if($coupon->maximum_spend && $coupon->maximum_spend < $amount){
        //     return ['id'=> $coupon->id,'description'=> "Your subtotal must be lower than $coupon->maximum_spend to avail this coupon",'value'=> 0];
        // }
        
        if($coupon->limit_per_user){
            if(!auth()->check()){
                return  ['id'=> $coupon->id,'description'=> "You must login to avail coupon",'value'=> 0];
            }
            $payment = Payment::where('user_id',auth()->id())->where('coupon_id',$coupon->id)->count();
            if($coupon->limit_per_user <= $payment)
            return ['id'=> $coupon->id,'description'=> "You have used this coupon before",'value'=> 0];
        }

        if($coupon->affiliate_id){
            if(!session('affiliate') ||  session('affiliate')['id'] != $coupon->affiliate_id){
                return  ['id'=> $coupon->id,'description'=> "Coupon is invalid",'value'=> 0];
            }  
        }
        $value = $coupon->percentage /100 * $amount;
        return ['id'=> $coupon->id,'description'=> 'Discount has been applied to your order','value'=> $value];
    }
    
}

