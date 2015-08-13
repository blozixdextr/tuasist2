<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Auth;
use Redirect;
use Session;
use App\Models\User;

class IndexController extends Controller
{

    public function __construct() {
       // dd('sdf');
    }

    public function index()
    {
        return view('pages.home');
    }

    public function register()
    {
        return view('pages.register');
    }

    public function locale($locale)
    {
        $allowedLocale = ['en', 'es', 'ru'];
        if (in_array($locale, $allowedLocale)) {
            if (Auth::check()) {
                $user = User::find(Auth::user()->id);
                $user->update(['locale' => $locale]);
            } else {
                Session::put('locale', $locale);
            }
        }
        return Redirect::back();
    }

}
