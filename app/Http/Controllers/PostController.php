<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = \App\Models\Post::all();
        return view('admin.posts.index',['posts'=>$posts]);
    }

    public function show(\App\Models\Post $post){
        return view('post',['post'=>$post]);
    }

    public function destroy(\App\Models\Post $post, Request $request){
        $post->delete();
        $request->session()->flash('delete_messege', 'Post has been deleted.');
        return back();
    }

    public function edit(\App\Models\Post $post){
        return view('admin.posts.edit')->with('post',$post);
    }

    public function patch(\App\Models\Post $post, Request $request){
        $validated_data = $request->validate([
            'title' => 'required|min:2|max:255',
            'image' => 'mimes:png,jpeg,jpg',
            'body' => 'required'
        ]);
        if($request->image){
            $validated_data['image'] = $request->file('image')->store('images');
            $post->image = $validated_data['image'];
        }
        $post->title = $validated_data['title'];
        $post->body = $validated_data['body'];
        $post->update();
        return redirect()->route('post.index');
    }
}
