<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App;
use Auth;
use Redirect;
use Session;
use App\Models\Task;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Category;
use App\Models\Location;
use App\Models\Mappers\TaskMapper;
use App\Models\Mappers\ViewMapper;
use Carbon\Carbon;


class TaskController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store', 'category', 'show']]);
        $this->user = Auth::user();
    }

    public function isAuthor($task, $user) {

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

    public function store(Request $request)
    {
        $rules = [
            'category' => 'required|numeric|exists:categories,id',
            'sub_category' => 'required|numeric|exists:categories,id',
            'title' => 'required|min:5|max:255',
            'subtitle' => 'required|min:5',
            'photo' => 'image|max:3500',
            'event_date' => 'date',
            'event_time' => 'date_format:H:i',
            'address' => 'min:5|max:255',
            'location' => 'required|numeric|exists:locations,id',
            'is_priced' => 'required|boolean',
            'price' => 'required_if:is_priced,1|numeric',
            'is_sms' => 'boolean',
            'is_email' => 'boolean',
            'taskers_only' => 'boolean',
            'no_comments' => 'boolean',
            'agree' => 'accepted',
        ];
        if (!$this->user) {
            $rules['name'] = 'required|min:2|max:255';
            $rules['email'] = 'required|email|unique:users,email';
            $rules['mobile'] = 'required|min:5|max:16';
        }
        $this->validate($request, $rules);

        $data = $request->all();

        if (!$this->user) {
            $user = new User([
                'is_active' => 1,
                'locale' => App::getLocale(),
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt(substr(uniqid(), 0, 8)),
            ]);
            $user->is_active = 1;
            $user->role = 'user';
            $user->type = 'client';
            $user->save();

            $profile = new UserProfile([
                'first_name' => $data['name'],
                'last_name' => '',
                'location' => $data['location'],
                'phone' => $data['mobile'],
                'last_activity' => Carbon::now(),
            ]);
            $profile->user_id = $user->id;
            $profile->type = 'personal';
            $profile->save();

            Auth::login($user);
            $this->user = $user;
        }
        $task = new Task([
            'is_active' => 1,
            'status' => 'bidding',
            'category_id' => $data['sub_category'],
            'location_id' => $data['location'],
            'title' => $data['title'],
            'subtitle' => $data['subtitle'],
            'address' => $data['address'],
            'price' => floatval($data['price']),
            'event_date' => new Carbon($data['event_date']),
            'event_time' => $data['event_time'],
            'sms' => isset($data['is_sms']) ? $data['is_sms'] : 0,
            'email' => isset($data['is_email']) ? $data['is_email'] : 0,
            'taskers_only' => isset($data['taskers_only']) ? $data['taskers_only'] : 0,
            'comments_public' => isset($data['no_comments']) ? !$data['no_comments'] : 1,
        ]);
        $task->user_id = $this->user->id;
        $task->save();
        $photo = $request->file('photo');
        if ($photo) {
            $ext = strtolower($photo->getClientOriginalExtension());
            $photoFile = TaskMapper::generatePhotoPath($task, $ext);
            $photo = $photo->move(pathinfo($photoFile, PATHINFO_DIRNAME), pathinfo($photoFile, PATHINFO_BASENAME));
            $task->photo = $photo->getFilename();
            $task->save();
        }

        return redirect('/task/show/'.$task->id);

    }

    public function show($taskId) {
        $taskId = intval($taskId);
        $task = Task::findOrFail($taskId);
        if (!$task->is_active) {
            return redirect('/');
        }
        if ($task->taskers_only && !$this->user) {
            return redirect('/auth/login');
        }

        ViewMapper::trackTask($task);
        return view('pages.task.show', compact('task'));
    }

}
