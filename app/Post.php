<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends BaseModel
{
    protected $rules = array(
        'title' => 'required|unique:posts',
        'text' => 'required|max:255',
    );

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($post) {
            $post->comments()->delete();
        });
    }
}
