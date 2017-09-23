<?php

namespace App;

use Validator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\ValidationException;

class Post extends Model
{
    private $rules = array(
        'title' => 'required|unique:posts',
        'text' => 'required|max:255',
    );

    public function validate($data)
    {
        $validator = Validator::make($data, $this->rules);

        if ($validator->fails())
        {
            throw new ValidationException($validator);
        }
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($post) {
            $post->comments()->delete();
        });
    }
}
