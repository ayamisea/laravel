<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;


class ProfileController extends Controller
{
    public function index($username)
    {
        $user = User::where('username',$username)->firstOrFail();
        if(Auth::check() and $username === Auth::user()->username) {
            return redirect()->route('home');
        }
        $posts = $user->posts()->with('user','likes')->orderBy('updated_at','desc')->paginate(10)->onEachSide(0);
        return view('home.show',[
            'user' => $user,
            'posts' => $posts,
        ]);
    }
    public function store(Request $request){
        $prof = $request->validate([
            'title' => 'max:30',
            'description' => 'max:250',
            'url' => '',
        ]);
        
        Auth::user()->profile()->update($prof);
        return back();
    }

}
