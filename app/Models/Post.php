<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'title',
        'content',
        
    ];
    public function likeBy(User $user){
        return $this->likes->contains('user_id',$user->id); 
        //ture/false
    }
    public function ownedBy(User $user)
    {
        return $this->user->id === $user->id;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
}
