<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        $posts=Post::with('getUser')->simplePaginate(5);
        return view('user.home',compact('posts'));
    }
    public function show(string $slug)
    {
    
        $post=Post::where('slug',$slug)->first();
        return view('user.post',compact('post'));
    }
}
