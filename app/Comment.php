<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends BaseModel
{
    protected $rules = array(
        'email' => 'required|blocked_email',
        'comment' => 'required',
    );

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
