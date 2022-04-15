<?php

namespace App\Http\Controllers;

//use App\Models\Kamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogInController extends Controller
{
    public function index() {
        $judul = "Log In";
        
        return view('login', compact('judul'));
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/pelaporan/home');
        }
        return back()->with('fail', 'Login Failed!');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('pelaporan-home');
    }
};