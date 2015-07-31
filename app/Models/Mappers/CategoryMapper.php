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

}