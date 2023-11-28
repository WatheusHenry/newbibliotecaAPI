<?php
// app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

   
        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {

            $token = bin2hex(random_bytes(32));
            $user->api_token = $token;
            $user->save();

            // Retorna o token
            return response()->json(['token' => $token], 200);
        }

        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }
}
