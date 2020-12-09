<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // $posts = auth()->user()->post->all(); show only this user posts
        $posts = Post::all();
        return view('admin.posts.index',['posts'=>$posts]);
    }

    public function show(Post $post){
        return view('post',['post'=>$post]);
    }

    public function destroy(Post $post, Request $request){
        $this->authorize('delete', $post);
        $post->delete();
        $request->session()->flash('delete_messege', 'Post has been deleted.');
        return back();
    }

    public function edit(Post $post){
        $this->authorize('update', $post);
        return view('admin.posts.edit')->with('post',$post);
    }

    public function patch(Post $post, Request $request){
        $this->authorize('update', $post);
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
        $request->session()->flash('update_messege', 'Record has been updated.');
        return redirect()->route('post.index');
    }
}
