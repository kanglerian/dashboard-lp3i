<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        } else {
            return view('layouts.auth');
        }
    }

    public function davtaru()
    {
        return view('layouts.reg');
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function daptar(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'nik' => $request->input('nik'),
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'role' => 'admin',
            'status' => 0,
        ];
        if ($request->input('password') == $request->input('confirmpassword')) {
            User::create($data);
            return redirect('/');
        }
        return redirect('/davtaru');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
