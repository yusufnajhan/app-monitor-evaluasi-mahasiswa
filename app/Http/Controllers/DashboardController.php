<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'operator') {
            return view('operator.dashboard');
        } else if ($user->role === 'mahasiswa') {
            return view('mahasiswa.dashboard');
        }
    }
}
