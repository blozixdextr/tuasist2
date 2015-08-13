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

class CategoryController extends Controller
{

    public function index()
    {
        return view('pages.home');
    }

    public function category($url, $id)
    {

    }

    public function subCategory(Request $request, $category, $format = '')
    {
        if ($format == '' && $request->ajax()) {
            $format = 'json';
        }
        $category = intval($category);
        if ($category == 0) {
            $categories = Category::roots()->get();
        } else {
            $category = Category::findOrFail($category);
            $categories = $category->children;
        }
        $categoriesTranslated = [];
        foreach ($categories as $c) {
            $t = [
                'title' => trans('categories.'.$c['title'].'.title'),
                'url' => trans('categories.'.$c['title'].'.url'),
                'id' => $c->id,
                'pid' => $c->pid,
            ];
            $categoriesTranslated[] = $t;
        }

        if ($format = 'json') {
            return $categoriesTranslated;
        }
    }

}
