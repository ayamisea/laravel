<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        $posts = Auth::user()->posts()->with('user','likes')->orderBy('updated_at','desc')->paginate(10)->onEachSide(0);
        
        return view('home.show',[
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
    
    public function destroy(Post $post) {
        if($post->ownedBy(Auth::user())){
            $post->delete();
        }
        return back();
    }

    public function edit(Post $post){
        if($post->ownedBy(Auth::user())){
            return view('home.edit-post',[
                'post' => $post,
            ]);
        }
        return redirect()->route('home');
    }
    public function update(Request $request){
        $post = Post::find($request->post_id);
        if($post and $post->ownedBy(Auth::user())){
            $edit_p = $request->only(['title','content','tag']);
            $post->update($edit_p);
        }
        return redirect()->route('home');
    }

    public function search(Request $request){
        $query = $request->search;
        
        if($query){
            $posts = Post::where('title','like',"%{$query}%")
            ->orWhere('content','like',"% {$query} %")
            ->orWhere('content','like',"{$query} %")
            ->orWhere('content','like',"% {$query}.")
            ->orWhere('content','like',"% {$query}");
            
        }
        if($request->sort_type){
            if($query){
                $posts = $posts->withCount('likes')->orderBy('likes_count', 'desc')->with('user','likes','messages')->paginate(10)->onEachSide(0);
            }
            else{
                $posts = Post::withCount('likes')->orderBy('likes_count', 'desc')->with('user','likes','messages')->paginate(10)->onEachSide(0);
            }
            
        }
        else{
            if($query){
                $posts = $posts->orderByDesc('updated_at')->with('user','likes','messages')->paginate(10)->onEachSide(0);
            }
            else{
                $posts = Post::orderByDesc('updated_at')->with('user','likes','messages')->paginate(10)->onEachSide(0);
            }
            
        }
        return view('search',[
            'posts' => $posts,
            'user' => Auth::user(),
        ]);
    }
}
