<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['category_id', 'location_id', 'title', 'subtitle',
        'photo', 'address', 'event_date', 'event_time', 'sms', 'email', 'taskers_only', 'comments_public'];

    protected $dates = ['event_date'];

    const photoDir = 'uploads/tasks/photo';

    public function comments()
    {
        return $this->morphMany('App\Model\Comment', 'commentable');
    }

    public function views()
    {
        return $this->morphMany('App\Model\View', 'viewable');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
