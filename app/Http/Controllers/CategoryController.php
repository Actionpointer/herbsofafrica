<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Currency;
use App\Models\Category;
use App\Models\Registration;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{

    public function index(){
        $categories = Category::paginate(50);
        return view('admin.categories', compact('categories'));
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);
        Category::create(['title' => $request->title,'description' => $request->description,'image' => $request->image]);
        return redirect()->back()->with(['flash_message'=> 'Category Created']);

    }


    public function update(Request $request){
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);
        Category::where('id',$request->category_id)->update(['title' => $request->title,'description' => $request->description,'image' => $request->image]);
        return redirect()->back()->with(['flash_message'=> 'Category Updated']);
    }

    public function delete(Request $request){
        $category = Category::find($request->category_id);
        if($category->products->isEmpty()){
            $category->delete();
            return redirect()->back()->with(['flash_message'=> 'Category Updated']);
        }
        return redirect()->back()->with(['flash_message'=> 'Could not delete category']);
    }

    

}
