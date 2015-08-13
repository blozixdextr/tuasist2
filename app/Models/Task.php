<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['category_id', 'location_id', 'title', 'subtitle',
        'photo', 'address', 'event_date', 'event_time', 'sms', 'email', 'taskers_only', 'comments_public'];

    protected $dates = ['event_date'];

    public function comments()
    {
        return $this->morphMany('App\Model\Comment', 'commentable');
    }
}
