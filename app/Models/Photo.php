<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

    protected $fillable = ['user_id', 'title', 'photo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
