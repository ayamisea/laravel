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
        if($username === Auth::user()->username) {
            return redirect()->route('home');
        }
        $posts = $user->posts()->with('user')->orderBy('updated_at','desc')->paginate(10);
        return view('home',[
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
