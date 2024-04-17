<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function show()
    {
        return view('auth.verify-email');
    }

    public function verify(Request $request, $id)
    {
        $user = User::find($id);

        if (! hash_equals((string) $request->route('id'), (string) $user->getKey())) {
            throw new AuthorizationException;
        }

        if (! hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect('login')->with('verified', true);
    }

//    public function resend(Request $request)
//    {
//        if ($request->user()->hasVerifiedEmail()) {
//            return redirect('/email/verify');
//        }
//
//        $request->user()->sendEmailVerificationNotification();
//
//        return back()->with('resent', true);
//    }
}
