<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Auth;
use Redirect;
use Session;
use App\Models\User;
use App\Models\Mappers\UserMapper;
use Socialite;
use Laravel\Socialite\Two\FacebookProvider;
use Mail;

class ProfileConfirmController extends UserController
{
    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function email()
    {
        $user = $this->user;
        Mail::send('emails.confirm.text', ['user' => $user], function ($m) use ($user) {
            $m->from('robot@tuasist.es', trans('emails.confirm.subject'));
            $m->to($user->email, $user->name)->subject(trans('mail.confirm.subject'));
        });
    }
}
