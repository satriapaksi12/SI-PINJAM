<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Registered;
use Brevo;

class AuthController extends Controller
{


    public function register()
    {
        $unit = Unit::all();
        return view('auth.register', ['unit' => $unit]);
    }
    public function registerProses(Request $request)
    {
        // Mendapatkan domain email dari input email
        $emailDomain = explode('@', $request->email)[1];

        // Menentukan peran (role) berdasarkan domain email
        $role_id = null;
        if ($emailDomain === 'staff.uns.ac.id') {
            $role_id = 3; // Staff
        } elseif ($emailDomain === 'student.uns.ac.id') {
            $role_id = 4; // Mahasiswa
        } else {
            session()->flash('error', 'Alamat email yang Anda masukkan tidak valid. Silakan gunakan alamat email yang sesuai format yang ditentukan.');
            return redirect()->back()->withInput();        }

        $user = User::create([
            'nama' => $request->nama,
            'nomor_induk' => $request->nomor_induk,
            'email' => $request->email,
            'unit_id' => $request->unit_id,
            'role_id' => $role_id,
            'password' => Hash::make($request->password),
        ]);
        event(new Registered($user));

        Auth::login($user);

        $user->sendEmailVerificationNotification();

        return redirect('/email/verify');
    }
    public function login()
    {
        return view('auth.login');
    }
    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }
        Session::flash('status', 'failed');
        Session::flash('message', 'Gagal Login');

        return redirect('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function profile()
    {
        $profile = Auth::user();
        return view('profile', ['profile' => $profile]);
    }
}
