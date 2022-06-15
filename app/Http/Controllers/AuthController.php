<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\AuthRequest;
use Session;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(AuthRequest $request)
    {
        $creds = $request->only(["email", "password"]);

        if (Auth::attempt($creds)) {
            return redirect()->route("dashboard");
        }
        Session::flash("danger", "Email or password is incorrect.");
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
