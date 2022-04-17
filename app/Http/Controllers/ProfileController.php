<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index() {
        $judul = "Profile";
        $users = User::where('nama','=','{{ auth()->user()->nama }}');
        return view('profile.profile', compact('judul', 'users'));
    }

    public function edit(){
        $judul = "Profile";
        return view('profile.edit',compact('judul'));
    }
    
    public function update(Request $request) {
        $key = $request->validate([
            'pengenal' => ['required','max:255'],
            'nomor_pengenal' => ['required','integer'],
            'nama' => ['required','min:2','max:255'],
            'alamat' => ['required','min:10'],
            'telepon' => ['required','numeric'],
            'email' => ['required','min:5','email:dns'],
            'password' => ['required','min:5'],
            'repassword' => ['required','same:password'],
        ]);

        $key['password'] = bcrypt($key['password']);
        $hashedpass = $key['password'];

        auth()->user()->update([
            'pengenal' => $request-> pengenal,
            'nomor_pengenal' => $request-> nomor_pengenal,
            'nama' => $request-> nama,
            'alamat' => $request-> alamat,
            'telepon' => $request-> telepon,
            'email' => $request-> email,
            'password' => $hashedpass,
            'repassword' => $request-> repassword,
        ]);

        return back()->with('success', 'Success!');
    }
}
