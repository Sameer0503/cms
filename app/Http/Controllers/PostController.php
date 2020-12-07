<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(\App\Models\Post $post){
        // dd($post);
        return view('post',['post'=>$post]);
    }
}
