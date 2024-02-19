<?php

namespace App\Http\Controllers;

use App\Http\Traits\FlutterwaveTrait;
use App\Http\Traits\GeoLocationTrait;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Post;
use App\Models\Staff;
use App\Models\Course;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Currency;
use App\Models\Training;
use App\Models\Testimonial;
use App\Models\Registration;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\ContactNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TrainingRegistrationNotification;


class WebsiteController extends Controller
{
    use GeoLocationTrait,FlutterwaveTrait;

    public function welcome(){
        $categories = Category::all();
        $products = Product::where('published',true)->where('featured',true)->get();
        return view('webpages.index',compact('products','categories'));
    }

    public function shop(){
        // request()->session()->flush();
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
        $products = Product::where('published',true)->whereNotNull($prices)->get();
        $categories = Category::orderBy('title','asc')->get();
        return view('webpages.products.shop')->with(['products'=> $products,'categories'=> $categories,'shopCategory'=> $category]);
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
        
        return view('webpages.posts.list');
    }

    public function post(){
        return view('webpages.posts.single');
    }

    public function news(Request $request){
        $tag = '';
        $posts = Post::orderBy('created_at','desc');
        if(request()->query() && request()->query('tag')){
            $tag = request()->query('tag');
            $posts = $posts->where('tags','LIKE',"%$tag%");
        }
        $posts = $posts->paginate(10);
        $post_tags = Post::all()->pluck('tags')->toArray();
        $categories = array_unique(explode(',',implode(',',$post_tags)));
        return view('webpages.posts.list', compact('posts','categories','tag'));
    }

    public function post_single(Request $request, $slug){
        $post = Post::findBySlug($slug);
        return view('webpages.posts.single', compact('post'));
    }

    public function switch_currency(){
        $currency = Currency::where('code',request()->currency)->first();
        session(['currency'=> ['code'=> $currency->code,'symbol'=> $currency->symbol]]);
        return response()->json(200);
    }

    public function getCountryStates($country_iso){
        //dd($this->getStates($country_iso));
        return $this->getStates($country_iso);
    }

    public function verify_account(Request $request){
        $response = $this->resolveBankAccountByFlutter($request->bank_code,$request->account_number);
        return response()->json(
            ['message' => $response ? 'Account fetched Successfully':'Unable to verify bank account',
            'name' => $response
            ],200);
        
    }

    
}
