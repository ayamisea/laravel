<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable =['post_id','filename'];

    public function post(){
        return $this->belongsTo(Post::class,'foreign_key');
    }
}
