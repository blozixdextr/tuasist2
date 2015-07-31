<?php

namespace App\Models\Mappers;

use App\Models\User ;

class UserMapper
{


    public function getNotifications() {

    }

    public static function getAvatarDir() {
        return public_path(User::avatarDir);
    }

    public static function generateAvatarPath(User $user, $format = 'jpg') {
        return self::getAvatarDir().'/'.$user->id.'.'.$format;
    }

}