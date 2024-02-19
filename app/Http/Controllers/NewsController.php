<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        abort_if(auth()->user()->role != 'admin',503,'Unauthorized Access');
        $posts = Post::orderBy('created_at','desc')->paginate(50);
        return view('admin.news.list', compact('posts'));
    }

    public function create(){
        $posts = Post::all()->pluck('tags')->toArray();
        $tags = array_unique(explode(',',implode(',',$posts)));
        return view('admin.news.add',compact('tags'));
    }

    public function edit(Post $post){
        $posts = Post::all()->pluck('tags')->toArray();
        $tags = array_unique(explode(',',implode(',',$posts)));
        return view('admin.news.edit',compact('post','tags'));
    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'title'=> 'required',
            'tags' => 'required',
            'content' => 'required',
            'excerpt' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'image' => $request->image,
            'tags' => implode(',',$request->tags),
            'content' => $request->content,
            'excerpt' => $request->excerpt,
            'status' => $request->status,
        ]);

        return redirect()->route('post.index');

    }

    public function update(Request $request){
        $request->validate([
            'post_id'=> 'required',
            'title'=> 'required',
            'tags' => 'required',
            'content' => 'required',
            'excerpt' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        Post::where('id',$request->post_id)->update([
            'title' => $request->title,
            'image' => $request->image,
            'tags' => implode(',',$request->tags),
            'content' => $request->content,
            'excerpt' => $request->excerpt,
            'status' => $request->status,
        ]);

        return redirect()->route('post.index');

    }

    public function delete(Request $request){
        abort_if(auth()->user()->role != 'admin',503,'Unauthorized Access');
        Post::where('id', $request->post_id)->delete();
        return redirect()->route('post.index');
    }
}
