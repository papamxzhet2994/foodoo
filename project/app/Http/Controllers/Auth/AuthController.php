<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function auth(LoginRequest $request)
    {
        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return back()->withErrors('Неверный логин или пароль');
        }

        $request->session()->regenerate();
        Auth::login($request->user());

        return redirect()->intended('/');
    }


    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
