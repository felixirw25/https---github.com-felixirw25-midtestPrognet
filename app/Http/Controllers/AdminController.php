<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Keluhan;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index() {
        $judul = "Admin Home";
        
        return view('admin.home', compact('judul'));
    }

    public function login() {
        $judul = "Admin Log In";
        
        return view('admin.login', compact('judul'));
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if(Auth::guard('admins')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin/home');
        }
        return back()->with('fail', 'Admin Login Failed!');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin-login');
    }

    public function laporan() {
        $judul = "List Laporan";
        $keluhans = Keluhan::all(); 
        return view('admin.listkeluhan', compact('keluhans', 'judul'));
    }

    public function detaillaporan($id) {
        $judul = "Admin Detail Keluhan";
        $keluhan = Keluhan::find($id);
        return view("admin.detailkeluhan", compact('keluhan', 'judul'));
    }

    public function editlaporan(Request $request, $id) {
        $judul = "Edit Keluhan";
        $keluhan = Keluhan::find($id);
        $formdata = [
            'balasan_admin' => $request-> input('balasan_admin'),
        ];
        return view("admin.editkeluhan", compact('keluhan', 'formdata', 'judul'));
    }

    public function saveeditlaporan(Request $request, $id) {
        $key = $request->validate([
            'balasan_admin' => 'max:50',
        ]);

        $value = array(
            $balasan_admin = 'judul_keluhan' => $request-> input('balasan_admin'),
        );

        $time = Carbon::now()->format('Y-m-d H:i:s');
        $keluhan = Keluhan::find($id);
        $keluhan->balasan_admin = $request->balasan_admin;
        $keluhan->waktu_balasan = $time;
        if ($keluhan->balasan_admin != "") {
            $keluhan->status = "Ditanggapi";
        }
        else {
            $keluhan->status = "Menunggu";
        }
        $keluhan->save();

        return redirect()->route('laporan-list');
    }

    public function deletelaporan($id) {
        $judul = "Hapus Laporan";
        $keluhan = Keluhan::find($id);
        $keluhan->is_delete = 1;
        $keluhan->save();
        return redirect()->route('laporan-list', 'judul');
    }
}
