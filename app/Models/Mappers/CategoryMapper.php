<?php

namespace App\Models\Mappers;

use App\Models\Category ;

class CategoryMapper
{

    public function massAdd($categories, $pid, $type) {
        foreach ($categories as $l) {
            Category::create(['title' => $l, 'pid' => $pid, 'type' => $type]);
        }
    }

    public static function getIconDir() {
        return public_path(Category::iconDir);
    }

    public static function generateIconPath(Category $category, $format = 'jpg') {
        return self::getIconDir().'/'.$category->id.'.'.$format;
    }

    public static function getIconSrc(Category $category) {
        if ($category->icon) {
            $icon = $category->icon;
        } else {
            $icon = 'default.jpg';
        }
        return '/'.Category::iconDir.'/'.$icon;
    }

    public static function getImageDir() {
        return public_path(Category::imageDir);
    }

    public static function generateImagePath(Category $category, $format = 'jpg') {
        return self::getImageDir().'/'.$category->id.'.'.$format;
    }

    public static function getImageSrc(Category $category) {
        if ($category->image) {
            $image = $category->image;
        } else {
            $image = 'default.jpg';
        }
        return '/'.Category::imageDir.'/'.$image;
    }

}