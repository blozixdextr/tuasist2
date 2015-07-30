<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = ['pid', 'title', 'subtitle', 'type'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function children()
    {
        return $this->hasMany(Location::class, 'pid');
    }

    public function parent()
    {
        return $this->belongsTo(Location::class, 'pid');
    }

    public function scopeStates($query) {
        return $query->where('type', 'state')->where('pid', 0);
    }
}
