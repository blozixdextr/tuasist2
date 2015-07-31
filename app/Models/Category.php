<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['pid', 'icon', 'image', 'title', 'subtitle', 'seo', 'type'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'pid');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'pid');
    }

    public function scopeRoots($query) {
        return $query->where('type', 'category')->where('pid', 0);
    }
}
