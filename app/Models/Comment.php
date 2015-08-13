<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['comment'];

    public function commentable()
    {
        return $this->morphTo();
    }
}
