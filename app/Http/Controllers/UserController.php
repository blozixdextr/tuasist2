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

class UserController extends Controller
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

}
