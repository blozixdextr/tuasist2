<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'locale', 'provider', 'oauth_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    const avatarDir = 'uploads/avatars';

    const photoDir = 'uploads/photos';


    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function points()
    {
        return $this->hasMany(UserPoint::class);
    }

    public function confirms()
    {
        return $this->hasMany(UserConfirm::class);
    }

    public function messagesTo()
    {
        return $this->hasMany(Message::class, 'user_id_recipient');
    }

    public function messagesFrom()
    {
        return $this->hasMany(Message::class, 'user_id_sender');
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public static function scopeOauth($query, $oauthId, $provider)
    {
        return $query->where('provider', '=', $provider)->where('oauth_id', '=', $oauthId);
    }


}
