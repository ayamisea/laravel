<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'profile_id',
    ];
    public function profile(){
        return $this->belongsTo(Profile::class,'foreign_key');
    }
    public function user(){
        return $this->belongsTo(User::class,'foreign_key');
    }
}
