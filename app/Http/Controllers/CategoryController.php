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

    public function index()
    {
        return view('pages.home');
    }

    public function category($url, $id)
    {

    }

}
