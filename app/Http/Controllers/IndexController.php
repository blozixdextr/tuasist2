<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Redirect;

class IndexController extends Controller
{

    public function index()
    {
        //
    }

    public function locale($locale)
    {
        $allowedLocale = ['en', 'es', 'ru'];
        if (in_array($locale, $allowedLocale)) {
            App::setLocale($locale);
            // @todo: if user save locale
        }
        Redirect::back();
    }

}
