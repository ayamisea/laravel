<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use App\Models\Follow;
use App\Models\Post;

use Illuminate\Support\Facades\Auth;


class FollowController extends Controller
{
    public function store(Profile $profile){
        if($profile->user() !== Auth::user()){
            $profile->follows()->create([
                'user_id' => Auth::user()->id,
            ]);
        }
        return back();
    }
    public function destroy(Profile $profile){
        Auth::user()->follows()->where('profile_id',$profile->id)->delete(); 
        return back();
    }

    public function follow($username){
        $follow_table = User::where('username',$username)->first()->follows()->get();
        $profile = Profile::whereIn('id',$follow_table->pluck('profile_id'))->with('follows','users','profiles');
        $follow = User::whereIn('id',$profile->pluck('user_id'))->with('follows','profile')->get();
        return view('home.follow',[
            'users' => $follow,
        ]);
    }
    public function follower($username){
        $follow_table = User::where('username',$username)->first()->profile->follows()->with('follows','user');
        $follower = User::whereIn('id',$follow_table->pluck('user_id'))->with('follows','profile')->get();
        
        return view('home.follow',[
            'users' => $follower,
        ]);
    }

    public function showposts(){
        $follow_table = Auth::user()->follows()->get();
        $followID = Profile::whereIn('id',$follow_table->pluck('profile_id'))->with('follows','users','profiles')->pluck('user_id');
        $posts = Post::whereIn('user_id',$followID)->with('user','likes')->orderBy('updated_at','desc')->paginate(10)->onEachSide(0);;
        //dd($posts->count());
        return view('dashboard',[
            'user' => Auth::user(),
            'posts' =>$posts,
            
        ]);
    }
}
