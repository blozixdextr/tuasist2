<?php

namespace App\Models\Mappers;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\Log;
use App\Models\Task;
use App\Models\View;
use Request;
use Auth;

class LogMapper
{


    public static function log($type, $value, $additional = null, $vars = null) {
        $ip = Request::ip();
        $user = Auth::user();
        if ($user) {
            $user_id = $user->id;
        } else {
            $user_id = 0;
        }
        $l = Log::create([
            'user_id' => $user_id,
            'ip' => $ip,
            'type' => $type,
            'key_value' => $value,
            'additional_value' => $additional,
            'var' => $vars
        ]);

        return $l;
    }

    public static function reviewed(Log $log) {
        $log->review_date = \Carbon\Carbon::now();
        $log->save();
    }


}