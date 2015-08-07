<?php

namespace App\Http\Controllers\Admin;

use Input;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Mappers\CategoryMapper;
use Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $pid = intval(Input::get('id', 0));
        if ($pid == 0) {
            $categories = Category::roots()->get();
            $category = false;
        } else {
            $category = Category::findOrFail($pid);
            $categories = $category->children;
        }
        return view('admin.pages.category.list', compact('categories', 'category'));
    }

    public function getRequestFiles(Request $request, Category $category, $data) {
        $image = $request->file('image');
        if ($image) {
            $ext = strtolower($image->getClientOriginalExtension());
            $imageFile = CategoryMapper::generateImagePath($category, $ext);
            $image = $image->move(pathinfo($imageFile, PATHINFO_DIRNAME), pathinfo($imageFile, PATHINFO_BASENAME));
            $data['image'] = $image->getFilename();
        }
        $icon = $request->file('icon');
        if ($icon) {
            $ext = strtolower($icon->getClientOriginalExtension());
            $iconFile = CategoryMapper::generateIconPath($category, $ext);
            $icon = $icon->move(pathinfo($iconFile, PATHINFO_DIRNAME), pathinfo($iconFile, PATHINFO_BASENAME));
            $data['icon'] = $icon->getFilename();
        }

        return $data;
    }

    public function getRequestData(Request $request) {
        $rules = [
            'title' => 'required',
            'subtitle' => 'min:2',
            'image' => 'image|max:2000',
            'icon' => 'image|max:100',
        ];
        $pid = intval($request->get('pid'));
        if ($pid > 0) {
            $rules['pid'] = 'required|exists:categories,id';
        }
        $this->validate($request, $rules);
        $data = $request->all();

        $pid = intval($data['pid']);
        if ($pid == 0) {
            $data['type'] = 'category';
        } else {
            $parent = Category::findOrFail($pid);
            if ($parent->pid == 0) {
                $data['type'] = 'subcategory';
            } else {
                $data['type'] = 'subsubcategory';
            }
        }

        return $data;
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $roots = Category::roots()->get();
        return view('admin.pages.category.edit', compact('category', 'roots'));
    }

    public function update($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $data = $this->getRequestData($request);
        $data = $this->getRequestFiles($request, $category, $data);
        $category->fill($data)->save();

        return Redirect::back();
    }

    public function create()
    {
        $pid = intval(Input::get('id', 0));
        if ($pid != 0) {
            $category = Category::findOrFail($pid);
        } else {
            $category = false;
        }
        $roots = Category::roots()->get();

        return view('admin.pages.category.add', compact('category', 'roots', 'pid'));
    }

    public function store(Request $request)
    {
        $data = $this->getRequestData($request);
        $category = Category::create($data);
        $data = $this->getRequestFiles($request, $category, []);
        $category->fill($data)->save();

        return Redirect::to('/admin/category/edit/'.$category->id);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return Redirect::back();
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.pages.category.show', compact('category'));
    }
}