<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['pid', 'icon', 'image', 'title', 'subtitle', 'type'];

    protected $hidden = ['created_at', 'updated_at'];

    const iconDir = 'uploads/categories/icon';

    const imageDir = 'uploads/categories/image';

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

    public function url() {
        return '/c/'.trans('categories.'.$this->title.'.url').'/'.$this->id;
    }

    public function delete()
    {
        $image = $this->image;
        $icon = $this->icon;
        if ($icon) {
            unlink( public_path(self::iconDir).'/'.$icon);
        }
        if ($image) {
            unlink(public_path(self::imageDir) . '/' . $image);
        }
        parent::delete();
    }
}
