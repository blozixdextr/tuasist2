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
use BulkSms;
use Log;

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

    public function mobile(Request $request)
    {
        $this->validate($request, ['mobile' => ['required', 'regex:/^\+[0-9]{10,12}+$/']]);
        $mobile = $request->get('mobile');
        $user = $this->user;
        $profile = $user->profile;
        if ($profile->confirmed_mobile) {
            return redirect('/profile')->with(['success' => trans('profile.my.confirm.phone.success')]);
        }
        $token = rand(1000, 9999);
        $confirmation = UserConfirm::create(['user_id' => $user->id, 'type' => 'mobile', 'token' => $token]);
        $smsMessage = trans('profile.my.confirm.sms.message', ['token' => $token]);
        try {
            //$result = BulkSms::sendMessage($mobile, $smsMessage);
            //Log::debug([$smsMessage, print_r($result, true)]);
            $profile->phone = $mobile;
            $profile->save();
        } catch (\Exception $e) {
            Session::flash('danger', trans('profile.my.confirm.sms.fail'));
            Log::error([print_r($e, true)]);

            return redirect('/profile');
        }
        $profile->phone = $mobile;
        $profile->save();

        return view('pages.profile.confirm_mobile', compact('mobile'));
    }

    public function mobileConfirm(Request $request)
    {
        $user = $this->user;
        $this->validate($request, ['token' => 'required|numeric']);
        $token = $request->get('token');
        $confirmation = UserConfirm::where('user_id', $user->id)->where('type', 'mobile')->orderBy('created_at', 'desc')->first();
        if ($confirmation && $confirmation->token == $token) {
            $profile = $user->profile;
            $profile->confirmed_mobile = 1;
            $profile->save();
            Session::flash('success', trans('profile.my.confirm.sms.success'));
        } else {
            Session::flash('danger', trans('profile.my.confirm.sms.error'));
        }

        return redirect('/profile');
    }

    public function passport()
    {
        $user = $this->user;
        $token = uniqid();
        $profile = $user->profile;
        if ($profile->confirmed_email) {
            return redirect('/profile')->with(['success' => trans('profile.my.confirm.email.success')]);
        }
        $confirmation = UserConfirm::create(['user_id' => $user->id, 'type' => 'email', 'token' => $token]);
        Mail::send('emails.confirm', ['user' => $user, 'token' => $token], function ($m) use ($user) {
            $m->from('robot@tuasist.es', trans('emails.confirm.subject'));
            $m->to($user->email, $user->name)->subject(trans('profile.my.confirm.email.subject'));
        });

        return view('pages.profile.confirm_mail');
    }
}
