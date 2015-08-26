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
use App\Models\UserConfirm;

class ProfileConfirmController extends UserController
{
    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function email()
    {
        $user = $this->user;
        $token = uniqid();
        $profile = $user->profile;
        if ($profile->confirmed_email) {
            //Session::flash('success', trans('profile.my.confirm.email.success'));
            return redirect('/profile')->with(['success' => trans('profile.my.confirm.email.success')]);
        }
        $confirmation = UserConfirm::create(['user_id' => $user->id, 'type' => 'email', 'token' => $token]);
        Mail::send('emails.confirm', ['user' => $user, 'token' => $token], function ($m) use ($user) {
            $m->from('robot@tuasist.es', trans('emails.confirm.subject'));
            $m->to($user->email, $user->name)->subject(trans('profile.my.confirm.email.subject'));
        });

        return view('pages.profile.confirm_mail');
    }

    public function emailConfirm($token)
    {
        $user = $this->user;
        $confirmation = UserConfirm::where('user_id', $user->id)->where('type', 'email')->orderBy('created_at', 'desc')->first();

        if ($confirmation && $confirmation->token == $token) {
            $profile = $user->profile;
            $profile->confirmed_email = 1;
            $profile->save();
            Session::flash('success', trans('profile.my.confirm.email.success'));
        } else {
            Session::flash('danger', trans('profile.my.confirm.email.error'));
        }

        return redirect('/profile');
    }
}
