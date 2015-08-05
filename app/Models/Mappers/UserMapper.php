<?php

namespace App\Models\Mappers;

use App\Models\User ;
use App\Models\UserProfile ;

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

    public static function getAvatarSrc(UserProfile $profile) {
        if ($profile->avatar) {
            $avatar = $profile->avatar;
        } else {
            $avatar = 'user.jpg';
        }
        return '/'.User::avatarDir.'/'.$avatar;
    }

}