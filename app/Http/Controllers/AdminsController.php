<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function create(){
        return view('admin.posts.create');
    }
    public function store(Request $request){
        $validated_data = $request->validate([
            'title' => 'required|min:2|max:255',
            'image' => 'mimes:png,jpeg,jpg',
            'body' => 'required'
        ]);
        if($request->image){
            $validated_data['image'] = $request->file('image')->store('images');
        }
        $request->user()->post()->create($validated_data);
        return back();
    }
    public function view(){
        return view('admin.posts.index');
    }
}
