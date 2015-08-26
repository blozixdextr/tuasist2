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
        $this->middleware('guest', ['except' => ['getLogout', 'facebookCallback']]);
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
        if (!isset($data['name']) || $data['name'] == '') {
            $name = '';
            if ($data['user_type'] == 'personal') {
                $name = $data['first_name'].' '.$data['last_name'];
            }
        } else {
            $name = $data['name'];
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

    public function getRegisterTasker()
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

        return view('pages.register.tasker', compact('states', 'regions', 'cities'));
    }

    public function postRegisterTasker(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $data = $request->all();
        $data['type'] = 'tasker';
        Auth::login($this->create($data));

        return redirect($this->redirectPath);
    }

    public function getRegisterClient()
    {
        return redirect('/task/create');
    }


    public function facebook()
    {
        $userType = Input::get('user_type');
        $type = Input::get('type');
        if (in_array($userType, ['personal', 'company']) || in_array($type, ['client', 'tasker'])) {
            Session::set('register.type', $type);
            Session::set('register.user_type', $userType);
        }
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $provider = 'facebook';
        if (Auth::user()) {
            $localUser = Auth::user();
            if ($localUser->profile) {
                UserMapper::confirmFacebook(Auth::user(), $user);
            }
            return redirect('/profile');
        }
        $oauthId = $user->getId();
        $localUser = User::oauth($oauthId, $provider)->first();
        if ($localUser) {
            Auth::loginUsingId($localUser->id);
            return redirect($this->redirectPath);
        } else {
            //dd($user);
            $nickname = $user->getNickname();
            $name = $user->getName();
            $email = $user->getEmail();
            $avatar = $user->getAvatar();
            $firstName = $user->offsetGet('last_name');
            $lastName = $user->offsetGet('first_name');
            $userType = Session::pull('register.user_type');
            $type = Session::pull('register.type');
            if (!$userType) {
                $userType = null;
            }
            if (!$type) {
                $type = null;
            }
            $data = [
                'name' => $name,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'password' => '',
                'city' => null,
                'mobile' => null,
                'user_type' => $userType,
                'type' => $type
            ];
            $localUser = $this->create($data);
            $localUser->provider = $provider;
            $localUser->oauth_id = $oauthId;
            if ($nickname == '') {
                $nickname = $oauthId;
            }
            $profile = $localUser->profile;
            $profile->facebook = 'http://facebook.com/'.$nickname;
            $profile->confirmed_facebook = true;
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
                return Redirect::back()->withErrors(['facebook' => trans('register.facebook.fail')]);
            }
        }
    }

}
