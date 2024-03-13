<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Cart;
use App\Models\Course;
use App\Models\Country;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use App\Http\Traits\CartTrait;
use App\Http\Traits\PaymentTrait;
use App\Http\Traits\PaystackTrait;
use App\Http\Traits\WishlistTrait;
use App\Http\Traits\FlutterwaveTrait;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    use CartTrait,WishlistTrait,PaymentTrait;
    protected $affiliate;
    
    public function __construct(){
        $this->middleware('auth')->only(['wishlist','addtowish','removefromwish']);
        if(request()->domain){
            $affiliate = Affiliate::where('username',request()->domain)->first();
            session(['affiliate'=> $affiliate]);
        }
    }

    public function index(){
        $carts = null;
        if(session('carts')){
            $carts = session('carts');
        }
        return view('webpages.cart',compact('carts'));
    }

    public function wishlist(){
        $user = auth()->user();
        $wishlists = $user->wishlists;
        return view('webpages.wishlist',compact('wishlists'));
    }

    public function addtocart(Request $request){
        $product = Product::find($request->product_id);
        if(!$product)
        abort(404);
        $quantity = $request->quantity;
        $carts = $this->addToCartSession($product,$quantity);
        if(auth()->check()){
            $this->addToCartDb($product,$quantity);
        }
        return response()->json([
                'status' => true,
                'message' => $carts->count() ? 'Cart retrieved Successfully':'No item in cart',
                'data' => $carts,
                'count' => $carts->sum('quantity') ?? 0
            ], 200);
    }

    public function removefromcart(Request $request){
        $product = Product::find($request->product_id);
        if(!$product)
        abort(404);
        $carts = $this->removeFromCartSession($product);
        if(auth()->check()){
            $this->removeFromCartDb($product);
        }
        
        return response()->json([
                'status' => true,
                'message' => $carts->count() ? 'Cart retrieved Successfully':'No item in cart',
                'data' => $carts,
                'count' => $carts->count() ?? 0
            ], 200);
            
    }

    public function addtowish(Request $request){
        $product = Product::find($request->product_id);
        if(!$product)
        abort(404);
        $wish = $this->addWishlist($product);
        return response()->json(['wish_count'=> $wish],200);
    }

    public function removefromwish(Request $request){
        $product = Product::find($request->product_id);
        if(!$product)
        abort(404);
        $wish = $this->removeWishlist($product);
        return response()->json(['wish_count'=> $wish],200);
    }

    public function checkout(){
        if(session('carts')){
            $carts = session('carts');
        }else{
            return back();
        }
        $countries = Country::all();
        return view('webpages.checkout',compact('carts','countries'));
    }    

}
