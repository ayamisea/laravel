<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $posts = Auth::user()->posts()->with('user','likes','images','messages')->orderBy('updated_at','desc')->paginate(10)->onEachSide(0);
        
        return view('home.show',[
            'user' => Auth::user(),
            'posts' => $posts,
        ]);
    }
    public function store(Request $request){

        $request->validate([
            'content'=>'required',
            'title'=>'required',
        ]);
        
        $post = Auth::user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        
        if($images = $request->file('images')){
            foreach($images as $img){
                $options = [
                    'public_id' => 'post_images/'.Str::random(40),
                ];
                $results = \Cloudinary\Uploader::upload($img,$options);
                Image::create([
                    'post_id' => $post->id,
                    'filename' => $results['public_id'],
                ]);
            }
        }
        return back();
    }
    
    public function destroy(Post $post) {
        if($post->ownedBy(Auth::user())){
            foreach($post->images()->get() as $img){
                $result = \Cloudinary\Uploader::destroy( $public_id = $img->filename);
                $img->delete();
            }
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

            if($request->delete_img_id and $img = $post->images()->find($request->delete_img_id)){
                $result = \Cloudinary\Uploader::destroy( $public_id = $img->filename);
                $img->delete();
                return back()->withInput();
            }
            else{
                $request->validate([
                    'content'=>'required',
                    'title'=>'required',
                ]);
      
                if($images = $request->file('images')){
                   
                    foreach($images as $img){
                        $options = [
                            'public_id' => 'post_images/'.Str::random(40),
                        ];
                        $results = \Cloudinary\Uploader::upload($img,$options);
                        Image::create([
                            'post_id' => $post->id,
                            'filename' => $results['public_id'],
                        ]);
                    }
                }
                //dd($request);
                $edit_p = $request->only(['title','content','tag']);
                $post->update($edit_p);
            }
            
        }
        $loc = '#post-'.$post->id;
        return redirect()->to(route('home').$loc);
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
                $posts = $posts->withCount('likes')->orderBy('likes_count', 'desc')->with('user','likes','messages','images')->paginate(10)->onEachSide(0);
            }
            else{
                $posts = Post::withCount('likes')->orderBy('likes_count', 'desc')->with('user','likes','messages','images')->paginate(10)->onEachSide(0);
            }
            
        }
        else{
            if($query){
                $posts = $posts->orderByDesc('updated_at')->with('user','likes','messages','images')->paginate(10)->onEachSide(0);
            }
            else{
                $posts = Post::orderByDesc('updated_at')->with('user','likes','messages','images')->paginate(10)->onEachSide(0);
            } 
        }
        return view('search',[
            'posts' => $posts,
            'user' => Auth::user(),
        ]);
    }
}
