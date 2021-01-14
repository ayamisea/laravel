<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Auth::user()->posts()->orderBy('updated_at','desc')->paginate(10)->onEachSide(0);
        
        return view('home',[
            'user' => Auth::user(),
            'posts' => $posts,
        ]);
    }
    public function store(Request $request){

        $request->validate([
            'content'=>'required',
        ]);
        
        Auth::user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return back();
    }
}
