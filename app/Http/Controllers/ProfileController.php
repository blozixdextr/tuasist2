<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Auth;
use Redirect;
use Session;
use App\Models\User;
use App\Models\Location;
use App\Models\Category;
use App\Models\Mappers\UserMapper;

class ProfileController extends Controller
{
    /**
     * @var User
     */
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
        if (!$this->checkProfileType()) {
            return redirect('/profile');
        }
        if ($this->checkProfileFill()) {
            return redirect('/profile');
        }
        $user = $this->user;
        $profile = $this->user->profile;
        $city = $profile->city;
        $region = $city->parent;
        $cities = $region->children;
        $categories = Category::roots()->get();

        $subscribePeriods = ['asap','hour','twice-day','day','two-days'];

        return view('pages.profile.fill', compact('user', 'profile', 'cities', 'categories', 'subscribePeriods'));
    }

    public function postFill(Request $request)
    {
        if (!$this->checkProfileType()) {
            return redirect('/profile');
        }
        if ($this->checkProfileFill()) {
            return redirect('/profile');
        }
        $user = $this->user;
        $profile = $this->user->profile;

        $rules = [
            'avatar' => 'required',
            'dob' => 'required|date|before:'.\Carbon\Carbon::now()->subYears(14),
            'sex' => 'required|in:male,female',
            'about' => 'max:255|min:2',
            'category' => 'required|array',
            'city' => 'required|array',
            'subscribe_period' => 'required|in:asap,hour,twice-day,day,two-days',
        ];

        $this->validate($request, $rules);

        $data = $request->all();

        if (isset($data['avatar']) && $data['avatar'] != '') {
            $avatar = $this->saveAvatarFromBase64($data['avatar']);
            if ($avatar) {
                $avatar = pathinfo($avatar, PATHINFO_BASENAME);
                $profile->avatar = $avatar;
            }
        }
        if (isset($data['about'])) {
            $profile->about = $data['about'];
        }
        $profile->sex = $data['sex'];
        $profile->subscribe_period = $data['subscribe_period'];
        $profile->dob = $data['dob'];
        $profile->save();

        $user->categories()->sync($data['category']);
        $user->locations()->sync($data['city']);
        $user->save();

        return redirect('/profile');
    }

    public function saveAvatarFromBase64($base64str) {
        list($format, $base64str) = explode(';', $base64str);
        list($encoding, $base64str)      = explode(',', $base64str);
        if ($encoding != 'base64') {
            return false;
        }
        $data = base64_decode($base64str);
        if (strpos($format, 'png') !== false) {
            $format = 'png';
        }
        if (strpos($format, 'jpg') !== false || strpos($format, 'jpeg') !== false) {
            $format = 'jpg';
        }
        if (strpos($format, 'gif') !== false) {
            $format = 'gif';
        }
        $avatarPath = UserMapper::generateAvatarPath($this->user, $format);
        if (file_put_contents($avatarPath, $data)) {
            return $avatarPath;
        }

        return false;
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
