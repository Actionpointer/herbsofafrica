<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Currency;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::orderBy('created_at','desc')->paginate(20);
        return view('admin.products.list', compact('products'));
    }

    public function create(){
        $currencies = Currency::all();
        $categories = Category::all();
        $prodTags = Product::all()->pluck('tags')->toArray();
        $tags = array_unique(explode(',',implode(',',$prodTags)));
        return view('admin.products.add',compact('currencies','categories','tags'));
    }

    public function store(Request $request){
        
        $request->validate([
            'title'=> 'required','tagline' => 'required',
            'category_id' => 'required','images' => 'required','download_link'=> 'required',
            'stock' => 'required','prices'=> 'required|array','published' => 'required',
        ]);
        $faqs = collect([]);
        foreach(array_filter($request->question) as $key => $question){
            $faqs->push([$question => $request->answer[$key]]);
        }

        Product::create([
            'title' => $request->title,
            'images' => $request->images,
            'prices' => $request->prices,
            'tagline' => $request->tagline,
            'section1' => $request->section1,
            'section2' => $request->section2,
            'section3' => $request->section3,
            'section4' => $request->section4,
            'category_id' => $request->category_id,
            'faqs' => $faqs,
            'tags' => $request->input('tags') ? implode(',',$request->tags) : null,
            'stock' => $request->stock,
            'download_link' => $request->download_link,
            'featured' => $request->featured,
            'published' => $request->published,
        ]);
        // dd($request->all());
        return redirect()->route('admin.products.index');

    }

    public function edit(Product $product){
        $currencies = Currency::all();
        $categories = Category::all();
        $prodTags = Product::all()->pluck('tags')->toArray();
        $tags = array_unique(explode(',',implode(',',$prodTags)));
        return view('admin.products.edit',compact('product','currencies','categories','tags'));
    }

    public function update(Request $request){
        // dd($request->all());
        $request->validate([
            'title'=> 'required','tagline' => 'required',
            'category_id' => 'required','images' => 'required','download_link'=> 'required',
            'stock' => 'required','prices'=> 'required|array','published' => 'required'
        ]);
        $faqs = collect([]);
        if($request->question){
            foreach(array_filter($request->question) as $key => $question){
                $faqs->push([$question => $request->answer[$key]]);
            }
        }
        Product::where('id',$request->product_id)->update([
            'title' => $request->title,
            'images' => $request->images,
            'prices' => $request->prices,
            'tagline' => $request->tagline,
            'section1' => $request->section1,
            'section2' => $request->section2,
            'section3' => $request->section3,
            'section4' => $request->section4,
            'category_id' => $request->category_id,
            'faqs' => $faqs,
            'tags' => $request->input('tags') ? implode(',',$request->tags) : null,
            'stock' => $request->stock,
            'download_link' => $request->download_link,
            'featured' => $request->featured,
            'published' => $request->published,
        ]);

        return redirect()->route('admin.products.index');

    }

    public function delete(Request $request){
        //Cart::where('ipaddress', request()->ip())->where('product_id', $request->product_id)->delete();
        Product::where('id', $request->product_id)->delete();
        return redirect()->route('admin.products.index');
    }
}
