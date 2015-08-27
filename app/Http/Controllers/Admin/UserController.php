<?php

namespace App\Http\Controllers\Admin;

use App\Models\Log;
use Input;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mappers\UserMapper;
use Redirect;
use App\Models\Mappers\LogMapper;

class UserController extends Controller
{
    public function index()
    {
        $name = Input::get('name', '');
        $onlyActive = Input::get('only_active', '');
        $perPage = Input::get('per_page', 50);
        if ($name || $onlyActive) {
            $users = User::simpleSearch($name, $onlyActive)->with('profile')->paginate($perPage);
        } else {
            $users = User::with('profile')->paginate($perPage);
        }

        return view('admin.pages.user.list', compact('users', 'onlyActive', 'name'));
    }

    public function ban($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = 0;
        $user->save();

        return Redirect::back();
    }

    public function unban($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = 1;
        $user->save();

        return Redirect::back();
    }

    public function passport()
    {
        $logs = LogMapper::type('passport');

        return view('admin.pages.user.passport', compact('logs'));
    }

    public function passportApprove($id, $log)
    {
        $user = User::findOrFail($id);
        $profile = $user->profile;
        $profile->confirmed_passport = true;
        $profile->save();
        $log = Log::findOrFail($log);
        LogMapper::reviewed($log);

        return Redirect::back();
    }

    public function passportDecline($id, $log)
    {
        $user = User::findOrFail($id);
        $profile = $user->profile;
        $profile->confirmed_passport = false;
        $profile->passport = null;
        $profile->save();
        $log = Log::findOrFail($log);
        LogMapper::reviewed($log);

        return Redirect::back();
    }
}