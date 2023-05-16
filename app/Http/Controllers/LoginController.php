<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function proses_login(Request $request)
    {
        $validation = validator($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $credential = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            if (Auth::attempt($credential)) {
                return redirect('/home');
            }

            return redirect()->back()->with('error', 'Password salah')->withInput(['email' => $request->email]);
        }

        return redirect()->back()->with('error', 'Email tidak ditemukan');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect('/login')->with('success', 'Berhasil Logout');
    }
}
