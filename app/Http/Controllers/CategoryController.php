<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        return view('components.categories', compact('categories'));
    }

    public function index()
    {
        $this->middleware('admin');
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function delete($id)
    {
        $this->middleware('admin');
        $category = Category::findOrFail($id);
        return view('admin.categories.delete', compact('category'));
    }

    public function destroy($id)
    {
        $this->middleware('admin');
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/admin');
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
