<?php

namespace App\Http\Controllers;

use App\Models\bio;
use App\Models\Post;

class homeController extends Controller
{
    
    public function index(){
        $data = Post::all();
        return view('home.home', compact('data'), ['bio' => bio::all()
        ]);

    }

    public function login(){
        return view('login.index');
    }

    public function register(){
        return view('register.index');
    }

    public function show($id)
    {
        return view('home.artikel', [
            'id' => Post::findOrFail($id)
        ]);
    }

}
