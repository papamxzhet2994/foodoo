<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('components.categories', compact('categories'));
    }

    public function create()
    {
        $this->middleware('admin');

        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->middleware('admin');
        $request->validate([
            'name' => 'required',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.categories.create');
    }
}
