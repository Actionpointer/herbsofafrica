<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\Category;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\ContactNotification;
use Illuminate\Support\Facades\Notification;



class WebsiteController extends Controller
{


    public function __construct()
    {
        if(request()->domain){
            $affiliate = Affiliate::where('username',request()->domain)->first();
            session(['affiliate'=> $affiliate]);
        }
    }

    public function welcome(){
        // $payment = \App\Models\Payment::find(3);
        // dd($payment->commission_currency);
        $categories = Category::all();
        $products = Product::where('published',true)->where('featured',true)->get();
        return view('webpages.index',compact('products','categories'));
    }

    public function shop(){    
        $prices = 'prices->'.session('currency')['code'];
        $products = Product::where('published',true)->whereNotNull($prices)->get();
        $categories = Category::orderBy('title','asc')->get();
        return view('webpages.products.shop', compact('products','categories'));
    }

    public function product(Product $product){
        return view('webpages.products.show',compact('product'));
    }

    public function categories(Category $category){

        $prices = 'prices->'.session('currency')['code'];
        $products = Product::where('published',true)->whereNotNull($prices)->where('category_id',$category->id)->get();
        $categories = Category::orderBy('title','asc')->get();
        $shopCategory = $category;
        return view('webpages.products.shop',compact('products','categories','shopCategory'));
        
    }

    public function contact(){
        return view('webpages.contact');
    }

    public function contact_store(Request $request){
        $content = ['name'=> $request->name,'email'=> $request->email,'subject'=> $request->subject,'message'=> $request->message];
        try {
            Notification::route('mail', 'admin@havron360.org')
                ->notify(new ContactNotification($content));
            Alert::toast('Contact Message Sent', 'success');
        } catch (\Throwable $th) {
            Alert::toast('Something Went Wrong', 'error');
        }

        return redirect()->back();
    }

    public function articles(){
        $tag = request()->query('tag') ?? null;
        $posts = Post::orderBy('created_at','desc');
        if($tag){
            $posts = $posts->where('tags','LIKE',"%$tag%");
        }
        $posts = $posts->paginate(10);
        $post_tags = Post::all()->pluck('tags')->toArray();
        $categories = array_unique(explode(',',implode(',',$post_tags)));
        return view('webpages.posts.list', compact('posts','categories','tag'));
    }

    public function post(Post $post){
        $recents = Post::where('id','!=',$post->id)->orderBy('created_at','asc')->take(10)->get();
        return view('webpages.posts.single', compact('post','recents'));
    }

    

    
}
