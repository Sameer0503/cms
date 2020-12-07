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
    public function store(){
        dd(request()->all());
    }
}
