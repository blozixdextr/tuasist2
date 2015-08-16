<?php

namespace App\Models\Mappers;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\Task;
use App\Models\View;
use Request;
use Auth;

class ViewMapper
{


    public static function trackTask(Task $task) {
        $ip = Request::ip();
        $user = Auth::user();
        if ($user) {
            $user_id = $user->id;
        } else {
            $user_id = 0;
        }
        $v = new View([
            'user_id' => $user_id,
            'ip' => $ip,
        ]);
        $task->views()->save($v);

    }


}