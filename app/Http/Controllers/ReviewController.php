<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ReviewResource;

class ReviewController extends Controller
{
    public function __construct(){
        $this->middleware('auth:sanctum')->only('review');
    }
    
    public function browse(Product $product){
        $reviews = Review::orderBy('created_at','desc')->paginate(16);
        return view('admin.reviews',compact('reviews'));
    }

    public function update(Request $request){
        Review::where('id',$request->review_id)->update(['status'=> $request->status]);
        return redirect()->back();
    }

    public function delete(Request $request){
        Review::where('id',$request->review_id)->delete();
        return redirect()->back();
    }

    public function store(Request $request){
        $review = Review::create(['user_id'=> auth()->id(),
        'order_id'=> $request->order_id,
        'order_item_id'=> $request->order_item_id,
        'product_id'=> $request->product_id,
        'rating'=> $request->rating/5*100,
        'body'=> $request->body]);
        return redirect()->back()->with(['result'=> 1,'message'=> 'Review successfully added']); 
    }

}
