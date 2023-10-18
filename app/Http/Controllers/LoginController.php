<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $loginError = session('loginError');

        return view('login', compact('loginError'));
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        // $user = User::with('operator', 'mahasiswa')->where('email', $credentials['email'])->first();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()
            ->withInput($request->only('email'))
            ->with('loginError', 'Login gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('logoutSuccess', 'Berhasil log out!');
    }
}
