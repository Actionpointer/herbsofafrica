<?php
namespace App\Http\Traits;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Arr;
use App\Http\Traits\OrderTrait;
use Illuminate\Support\Facades\Auth;

trait CartTrait
{
    use OrderTrait;

    protected function addToCartSession(Product $product,$quantity = 1,$update = false){
        $carts = session('carts');
        //if cart is empty then this is the first product
        if(!$carts) {
            $carts = collect();
            $cart = [
                        "id" => null,
                        "product_id" => $product->id,
                        "title"=> $product->title,
                        "url"=> route('product.show',$product),
                        "category"=> $product->category->title,
                        "images"=> explode(',',$product->images),
                        "stock"=> $product->stock,
                        "prices"=> $product->prices,
                        'quantity' => abs($quantity),
                        'amount' => array_map(function ($value) use($quantity){return $value * $quantity;},$product->prices)
                ];
            $carts = $carts->push($cart);
            session(['carts' => $carts]);
        }elseif($carts->firstWhere('product_id',$product->id)) {
                // if cart not empty then check if this product exist 
                if($update){
                    //if required action is update, replace quantity
                    $carts = $carts->map(function ($item, $key) use($product,$quantity){
                        if($item['product_id'] == $product->id) {
                            $item['quantity'] = abs($quantity);
                            $item['amount'] = array_map(function ($value) use($quantity){return $value * $quantity;},$product->prices);
                        }
                        return $item;
                    });
                }     
                else{
                    //else, increment quantity
                    $carts = $carts->map(function ($item, $key) use($product,$quantity){
                        if($item['product_id'] == $product->id) {
                            $new_quantity = $item['quantity'] + $quantity;
                            $item['quantity'] = $new_quantity;
                            $item['amount'] = array_map(function ($value) use($new_quantity){return $value * $new_quantity;},$product->prices);
                        }
                        return $item;
                    });
                }  
                session(['carts' => $carts]);
        }else{
                // if item not exist in cart then add to cart with quantity = 1
                $cart = [
                    "id" => null,
                    "product_id" => $product->id,
                    "title"=> $product->title,
                    "url"=> route('product.show',$product),
                    "category"=> $product->category->title,
                    "images"=> explode(',',$product->images),
                    "stock"=> $product->stock,
                    "prices"=> $product->prices,
                    'quantity' => abs($quantity),
                    'amount' => array_map(function ($value) use($quantity){return $value * $quantity;},$product->prices)
                ];
                $carts = $carts->push($cart);
                session(['carts' => $carts]); 
        }
        return $carts;
    }

    protected function removeFromCartSession(Product $product){
        $carts = session('carts');
        if($carts && $carts->count()){
            $carts = $carts->filter(function($item, $key) use($product){
                return ($item['product_id'] != $product->id);
            });
            session(['carts' => $carts]); 
        }
        return session('carts');
    }

    protected function addToCartDb(Product $product,$quantity = 1,$update = false){
        $user = Auth::user();
        $dbcart = Cart::where('user_id',$user->id)->where('product_id',$product->id)->first();
        if(!$dbcart){
            $dbcart = Cart::create(['user_id' => $user->id,'product_id' => $product->id,'quantity' => abs($quantity), 'prices'=> $product->prices]);
        }else{
            if($quantity == -1 && $dbcart->quantity == 1){
                $dbcart = Cart::where('user_id',$user->id)->where('product_id',$product->id)->delete();
            }else{
                if($update){
                    $dbcart->quantity = $quantity;
                }   
                else {
                    $new_quantity = $dbcart->quantity + $quantity;
                    $dbcart->quantity = $dbcart->quantity + $quantity;
                }
                $dbcart->save();
            }
        }
        
    }
    
    protected function removeFromCartDb(Product $product){
        $user = Auth::user();
        $dbcart = Cart::where('user_id',$user->id)->where('product_id',$product->id)->delete();
    }
}

