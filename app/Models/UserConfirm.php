<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserConfirm extends Model
{
    protected $table = 'user_confirms';

    protected $fillable = ['user_id', 'type', 'token'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
