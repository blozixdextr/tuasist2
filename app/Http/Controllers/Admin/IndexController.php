<?php

namespace App\Http\Controllers\Admin;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin/pages/index');
    }
}