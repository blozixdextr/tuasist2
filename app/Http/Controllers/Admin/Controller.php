<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;
use Redirect;

class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    public $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
        if (!$this->user) {
            Redirect::to('/auth/login')->send();
        }
        if ($this->user->role != 'admin') {
            Redirect::to('/auth/logout')->send();
        }
    }
}