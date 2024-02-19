<?php
namespace App\Http\Traits;
use App\Models\Product;
use App\Models\Wishlist;


trait WishlistTrait
{
    protected function addWishlist(Product $product){
        $user = auth()->user();
        Wishlist::firstOrCreate(['user_id' => $user->id,'product_id' => $product->id]);
        return $user->wishlists->count();

    }
    protected function removeWishlist(Product $product){
        $user = auth()->user();
        Wishlist::where('user_id',$user->id)->where('product_id',$product->id)->delete();
        return $user->wishlists->count();
    }
    
}

