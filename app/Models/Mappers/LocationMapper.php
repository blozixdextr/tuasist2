<?php

namespace App\Models\Mappers;

use App\Models\User ;
use App\Models\Location ;

class LocationMapper
{

    public function massAdd($locations, $pid, $type) {
        /*
            $l = explode("\n", $str);
            foreach ($l as $t) {
                $locations[] = trim($t);
            }
         */
        foreach ($locations as $l) {
            Location::create(['title' => $l, 'pid' => $pid, 'type' => $type]);
        }
    }

}