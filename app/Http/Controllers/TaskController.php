<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Auth;
use Redirect;
use Session;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;

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

    public function create($category = 0)
    {
        $category = intval($category);
        if ($category > 0) {
            $category = Category::findOrFail($category);
        }
        $categories = Category::roots()->get();
        $user = Auth::user();
        $states = Location::states()->first();
        $regions = $states->children()->first();
        $locations = $regions->children;

        return view('pages.task.create', compact('category', 'categories', 'user', 'locations'));
    }

}
