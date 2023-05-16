<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function proses_register(Request $request){
        $validation = validator($request->all(), [
            'nama' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required',
        ]);

        if($validation->fails()){
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success', 'Registrasi Berhasil');
    }
}
