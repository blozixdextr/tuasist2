<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\Location;
use Carbon\Carbon;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use App;
use Auth;
use Socialite;
use Session;
use Input;
use Redirect;
use App\Models\Mappers\UserMapper;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public $redirectPath = '/profile';
    public $redirectTo = '/profile';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $rules = [
            'type' => 'required|in:tasker,client',
            'user_type' => 'required|in:personal,company',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'city' => 'required|exists:locations,id,type,city',
            'mobile' => 'required|min:6|max:20',
            'first_name' => 'required_if:user_type,personal',
            'last_name' => 'required_if:user_type,personal',
            'company_name' => 'required_if:user_type,company',
            'accept_terms' => 'accepted'
        ];
        return Validator::make($data, $rules);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $name = '';
        if ($data['user_type'] == 'personal') {
            $name = $data['first_name'].' '.$data['last_name'];
        }
        if ($data['user_type'] == 'company') {
            $name = $data['company_name'];
            $data['first_name'] = '';
            $data['last_name'] = '';
        }
        $user = new User([
            'is_active' => 1,
            'locale' => App::getLocale(),
            'name' => $name,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $user->is_active = 1;
        $user->role = 'user';
        $user->type = $data['type'];
        $user->save();

        $profile = new UserProfile([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'location' => $data['city'],
            'phone' => $data['mobile'],
            'last_activity' => Carbon::now(),
        ]);
        $profile->user_id = $user->id;
        $profile->type = $data['user_type'];
        $profile->save();
        return $user;



    }

    protected function getCredentials(Request $request)
    {
        return array_merge(['is_active' => 1], $request->only($this->loginUsername(), 'password'));
    }

    public function getRegister()
    {
        $states = Location::states()->get();
        $regions = $states->first()->children;
        $cities = $regions->first()->children;
        $citiesArr = ['' => trans('register.city.placeholder')];
        $regionsArr = [];
        $statesArr = [];
        foreach ($cities as $s) {
            $citiesArr[$s->id] = $s->title;
        }
        foreach ($regions as $s) {
            $regionsArr[$s->id] = $s->title;
        }
        foreach ($states as $s) {
            $statesArr[$s->id] = $s->title;
        }
        $cities = $citiesArr;
        $states = $statesArr;
        $regions = $regionsArr;

        return view('auth.register', compact('states', 'regions', 'cities'));
    }

    public function facebook()
    {
        $userType = Input::get('user_type');
        $type = Input::get('type');
        if (!in_array($userType, ['personal', 'company']) || !in_array($type, ['client', 'tasker'])) {
            return Redirect::back()->withError(['facebook' => trans('register.facebook.fail')]);
        }
        Session::set('register.type', $type);
        Session::set('register.user_type', $userType);
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $provider = 'facebook';
        $oauthId = $user->getId();
        $localUser = User::oauth($oauthId, $provider)->first();
        if ($localUser) {
            Auth::loginUsingId($localUser->id);
            return redirect($this->redirectPath);
        } else {
            //dd($user);
            $nickname = $user->getNickname();
            //$name = $user->getName();
            $email = $user->getEmail();
            $avatar = $user->getAvatar();
            $firstName = $user->offsetGet('last_name');
            $lastName = $user->offsetGet('first_name');
            $data = [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'password' => '',
                'city' => null,
                'mobile' => null,
                'user_type' => Session::get('register.user_type'),
                'type' => Session::get('register.type')
            ];
            $localUser = $this->create($data);
            $localUser->provider = $provider;
            $localUser->oauth_id = $oauthId;
            if ($nickname == '') {
                $nickname = $oauthId;
            }
            $profile = $localUser->profile;
            $profile->facebook = 'http://facebook.com/'.$nickname;
            $localUser->save();
            $avatarPath = UserMapper::generateAvatarPath($localUser);
            try {
                if ($avatar) {
                    file_put_contents($avatarPath, fopen($avatar, 'r'));
                    $profile->avatar = pathinfo($avatarPath, PATHINFO_BASENAME);
                }
            } catch (\Exception $e) {
                $profile->avatar = null;
            }
            $profile->save();
            Auth::loginUsingId($localUser->id);
            if ($user) {
                return redirect($this->redirectPath);
            } else {
                return redirect('/auth/login')->withErrors(['facebook' => trans('register.facebook.fail')]);
            }
        }
    }

}
