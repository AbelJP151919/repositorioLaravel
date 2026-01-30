<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('login'); // resources/views/login.blade.php
    }

    public function store(Request $request)
    {
        // Validación
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar iniciar sesión
        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Credenciales incorrectas.',
            ]);
        }

        // Regenerar sesión por seguridad
        $request->session()->regenerate();

        return redirect('/')->with('success', 'Sesión iniciada correctamente');
    }
}
