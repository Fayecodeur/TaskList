<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        // User::create([
        //     "name" => "Demba Faye",
        //     "email" => "fayecodeur@gmailcom",
        //     "password" => Hash::make('azerty')
        // ]);
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        // Vérifier les données envoyées
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('index');
        }

        return back()->with([
            "error" => "Identifiant incorrect"
        ]);
    }
}
