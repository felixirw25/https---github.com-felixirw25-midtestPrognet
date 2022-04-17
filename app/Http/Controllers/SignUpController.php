<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelaporan;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function index() {
        $judul = "Sign Up";
        $formdata = [
            'pengenal' => ['select', "Pengenal", ['KTP', 'Paspor']],
            'nomor_pengenal' => ['text', "Nomor Pengenal"],
            'nama' => ['text', "Nama"],
            'alamat' => ['text', "Alamat"],
            'telepon' => ['text', "Telepon"],
            'email' => ['text', "Email"],
            'password' => ['password', "Password"],
            'repassword' => ['password', "Re-Enter Password"],
        ];
        return view('signup', compact('judul', 'formdata'));
    }

    public function savesignup(Request $request) {
        $key = $request->validate([
            'pengenal' => 'required|max:255',
            'nomor_pengenal' => 'required|integer|unique:users',
            'nama' => 'required|min:2|max:255',
            'alamat' => 'required|min:10',
            'telepon' => 'required|numeric',
            'email' => 'required|min:5|unique:users|email:dns',
            'password' => 'required|min:5',
            'repassword' => 'required|same:password',
        ]);

        $value = array(
            $pengenal = 'pengenal' => $request-> input('pengenal'),
            $nomor_pengenal = 'nomor_pengenal' => $request-> input('nomor_pengenal'),
            $nama = 'nama' => $request-> input('nama'),
            $alamat = 'alamat' => $request-> input('alamat'),
            $telepon = 'telepon' => $request-> input('telepon'),
            $email = 'email' => $request-> input('email'),
            $password = 'password' => $request-> input('password'),
            $repassword = 'repassword' => $request-> input('repassword'),
        );

        $key['password'] = bcrypt($key['password']);
        $hashedpass = $key['password'];

        User::create([
            'pengenal' => $request-> input('pengenal'),
            'nomor_pengenal' => $request-> input('nomor_pengenal'),
            'nama' => $request-> input('nama'),
            'alamat' => $request-> input('alamat'),
            'telepon' => $request-> input('telepon'),
            'email' => $request-> input('email'),
            'password' => $hashedpass,
            'repassword' => $request-> input('repassword'),
        ]);

        return redirect()->route('pelaporan-login')->with('success', 'Sign Up Success! Please Log In');
    }

}
