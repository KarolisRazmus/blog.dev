<?php

namespace App;

use Illuminate\Http\Request;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment(Request $request)
    {
        $this->comments()->create(['body'=>$request->body]);
    }
}
