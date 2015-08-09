<?php

namespace App\Http\Controllers\Admin;

use Input;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mappers\UserMapper;
use Redirect;

class UserController extends Controller
{
    public function index()
    {
        $name = Input::get('name', false);
        $onlyActive = Input::get('only_active', false);
        $perPage = Input::get('per_page', 15);
        if ($name) {
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
}