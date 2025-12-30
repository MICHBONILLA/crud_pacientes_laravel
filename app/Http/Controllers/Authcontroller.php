<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    public function mostrarLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'documento' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('documento', 'password'))) {
            $request->session()->regenerate();
            return redirect('/pacientes');
        }

        return back()->with('error', 'Documento o clave incorrectos');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
