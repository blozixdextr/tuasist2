<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Auth;
use Redirect;
use Session;
use App\Models\User;

class TaskController extends Controller
{

    public function index()
    {

    }

    public function isInitiator($task, $user) {

    }

    public function isSelectedTasker($task, $user) {

    }

    public function isBlockedTasker($user) {

    }

    public function isDeclinedTasker($user) {

    }

    public function create()
    {
        return view('pages.task.create');
    }

}
