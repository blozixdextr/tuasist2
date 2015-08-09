<?php

namespace App\Http\Controllers\Admin;

use Input;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Mappers\LocationMapper;
use Redirect;

class LocationController extends Controller
{
    public function index()
    {
        $pid = intval(Input::get('id', 0));
        if ($pid == 0) {
            $locations = Location::states()->get();
            $location = false;
        } else {
            $location = Location::findOrFail($pid);
            $locations = $location->children;
        }

        return view('admin.pages.location.list', compact('locations', 'location'));
    }

    public function getRequestData(Request $request) {
        $rules = [
            'title' => 'required',
            'subtitle' => 'min:2'
        ];
        $pid = intval($request->get('pid'));
        if ($pid > 0) {
            $rules['pid'] = 'required|exists:locations,id';
        }
        $this->validate($request, $rules);
        $data = $request->all();

        $pid = intval($data['pid']);
        if ($pid == 0) {
            $data['type'] = 'state';
        } else {
            $parent = Location::findOrFail($pid);
            if ($parent->pid == 0) {
                $data['type'] = 'region';
            } else {
                $data['type'] = 'city';
            }
        }

        return $data;
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        //$parents = $location->parent->siblings();
        if ($location->pid == 0) {
            $parents = [];
        } else {
            $parent = $location->parent;
            if ($parent->pid == 0) {
                $parents = Location::states()->get();
            } else {
                $parents = $location->siblings();
            }
        }

        return view('admin.pages.location.edit', compact('location', 'parents'));
    }

    public function update($id, Request $request)
    {
        $location = Location::findOrFail($id);
        $data = $this->getRequestData($request);
        $location->fill($data)->save();

        return Redirect::back();
    }

    public function create()
    {
        $pid = intval(Input::get('id', 0));
        if ($pid != 0) {
            $location = Location::findOrFail($pid);
            if ($location->pid == 0) {
                $parents = Location::states()->get();
            } else {
                $parents = $location->siblings();
            }
        } else {
            $location = false;
            $parents = Location::states()->get();
        }

        return view('admin.pages.location.add', compact('location', 'parents', 'pid'));
    }

    public function store(Request $request)
    {
        $data = $this->getRequestData($request);
        $location = Location::create($data);
        $location->fill($data)->save();

        return Redirect::to('/admin/location/edit/'.$location->id);
    }

    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return Redirect::back();
    }

    public function show($id)
    {
        $location = Location::findOrFail($id);

        return view('admin.pages.location.show', compact('location'));
    }
}