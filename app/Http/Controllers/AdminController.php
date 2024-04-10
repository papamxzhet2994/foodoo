<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $this->middleware('admin');
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function delete($id)
    {
        $this->middleware('admin');
        $user = User::all();
        $user = $user->where('id', '!=', auth()->user()->id)->find($id) ?? abort(404);
        return view('admin.delete', compact('user'));
    }

    public function destroy($id)
    {
        $this->middleware('admin');
        $user = User::all();
        $user = $user->where('id', '!=', auth()->user()->id)->find($id) ?? abort(404);
        $user->delete();
        return redirect('/admin');
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_admin = true ?? false;
        $user->save();
        return redirect('/admin');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
