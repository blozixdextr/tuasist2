<?php

namespace App\Models\Mappers;

use App\Models\Task ;
use App\Models\TaskBid ;
use App\Models\User ;
use App\Models\UserProfile ;

class TaskMapper
{

    public static function getPhotoDir() {
        return public_path(Task::photoDir);
    }

    public static function generatePhotoPath(Task $task, $format = 'jpg') {
        return self::getPhotoDir().'/'.$task->id.'.'.$format;
    }

    public static function getImageSrc(Task $task) {
        if ($task->photo) {
            return '/'.Task::photoDir.'/'.$task->photo;
        }
        return false;
    }

}