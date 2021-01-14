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
        return view('home',[
            'user' => $user,
        ]);
    }
    public function store(Request $request){
        $prof = $request->validate([
            'title' => 'max:30',
            'description' => 'max:250',
            'url' => '',
        ]);
        
        Auth::user()->profile()->update($prof);
        return redirect()->route('home');
    }

}
