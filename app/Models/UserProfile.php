<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [ 'first_name', 'last_name', 'sex', 'dob', 'about', 'avatar', 'phone', 'location',
                            'subscribe_period', 'subscribe_type', 'subscribe_sent',
                            'last_activity', 'passport', 'facebook', 'twitter', 'google'];

    protected $dates = ['dob', 'subscribe_sent', 'last_activity'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


