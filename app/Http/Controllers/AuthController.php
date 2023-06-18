<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{


    public function register()
    {
        $unit = Unit::all();
        return view('auth.register',['unit'=>$unit]);
    }
    public function registerProses(Request $request)
    {
        $user = User::create([
            'nama' => $request->nama,
            'nomor_induk' => $request->nomor_induk,
            'email' => $request->email,
            'unit_id' => $request->unit_id,
            'role_id' =>5,
            'password' =>Hash::make($request->password),
        ]);
        event(new Registered($user));
        Auth::login($user);
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
