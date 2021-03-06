<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'title',
        'description',
        'url',
    ];

    public function followBy(User $user){
        return $this->follows->contains('user_id',$user->id); 
        //ture/false
    }

    public function user(){
        return $this->belongsTo(User::class,'foreign_key');
    }
    
    public function follows(){
        return $this->hasMany(Follow::class);
    }

}
