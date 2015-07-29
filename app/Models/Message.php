<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = ['user_id_recipient', 'user_id_sender', 'message', 'is_seen'];

    /**
     * Get the sender
     */
    public function sender()
    {
        return $this->belongsTo('App\User', 'user_id_sender');
    }

    /**
     * Get the sender
     */
    public function recipient()
    {
        return $this->belongsTo('App\User', 'user_id_recipient');
    }
}