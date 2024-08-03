<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check the authenticated user's role and redirect accordingly
            $role = Auth::user()->role;
            switch ($role) {
                case 'kaprodi':
                    return redirect()->intended('/kaprodi');
                case 'dosen-wali':
                    return redirect()->intended('/dosenwali');
                case 'mahasiswa':
                    return redirect()->intended('/mahasiswa');
            }
        }

        return back()->with('login-error', 'Login Failed');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
