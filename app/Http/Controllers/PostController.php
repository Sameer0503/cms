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
}
