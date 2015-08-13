<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskBid extends Model
{
    protected $table = 'task_bids';

    protected $fillable = ['description', 'price', 'status'];

    public function comments()
    {
        return $this->morphMany('App\Model\Comment', 'commentable');
    }
}
