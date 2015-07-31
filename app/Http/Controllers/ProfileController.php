<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Auth;
use Redirect;
use Session;
use App\Models\User;

class ProfileController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
        if (!$this->user || $this->user->role != 'user') {
            redirect('/');
        }
    }

    public function checkProfileType()
    {
        if (!$this->user->type || !$this->user->profile->type) {
            return false;
        }
        return true;
    }

    public function checkProfileFill()
    {
        if (!$this->user->profile->sex) {
            return false;
        }
        return true;
    }

    public function index()
    {
        if (!$this->checkProfileType()) {
            return redirect('/profile/types');
        }
        if (!$this->checkProfileFill()) {
            return redirect('/profile/fill');
        }
        $user = $this->user;
        $profile = $this->user->profile;
        return view('pages.profile.index', compact('user', 'profile'));
    }

    public function getFill()
    {
        if ($this->checkProfileType()) {
            return redirect('/profile');
        }
        if ($this->checkProfileFill()) {
            return redirect('/profile');
        }
        $user = $this->user;
        $profile = $this->user->profile;
        return view('pages.profile.fill', compact('user', 'profile'));
    }

    public function postFill(Request $request)
    {
        if ($this->checkProfileType()) {
            return redirect('/profile');
        }
        if ($this->checkProfileFill()) {
            return redirect('/profile');
        }
        $user = $this->user;
        $profile = $this->user->profile;

        $rules = [];
        $this->validate($request, $rules);

        $data = [];

        $profile->fill($data);

    }

    public function getTypes()
    {
        if ($this->checkProfileType()) {
            return redirect('/profile');
        }
        $user = $this->user;
        $profile = $this->user->profile;
        return view('pages.profile.types', compact('user', 'profile'));
    }

    public function postTypes(Request $request)
    {
        if ($this->checkProfileType()) {
            return redirect('/profile');
        }
        $rules = [];
        $user = $this->user;
        $profile = $this->user->profile;
        if (!$user->type) {
            $rules['type'] = 'required|in:tasker,client';
        }
        if (!$profile->type) {
            $rules['user_type'] = 'required|in:personal,company';
        }
        $this->validate($request, $rules);
        if (!$user->type) {
            $user->type = $request->get('type');
            $user->save();
        }
        if (!$profile->type) {
            $profile->type = $request->get('user_type');
            $profile->save();
        }
        return redirect('/profile');
    }

}
