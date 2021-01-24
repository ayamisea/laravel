<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class PostMessageController extends Controller
{
    public function store(Request $request){
    
        Auth::user()->messages()->create([
            'user_id' => Auth::user()->id,
            'post_id' => $request->post_id,
            'content' => $request->content,
        ]);
        $loc = '#post-'.$request->post_id;
        
        return redirect(url()->previous().$loc);
    }
    public function destroy(Message $message){

        Auth::user()->messages()->where('id',$message->id)->delete(); 
        return back();
    }
}
