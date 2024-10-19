<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Adicione a importação do modelo User
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    // Método de registro
    public function register(Request $request)
    {
        // Validação dos dados de entrada
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', // `confirmed` espera um campo `password_confirmation`
        ]);

        // Criação do novo usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Criptografar a senha
        ]);

        // Você pode optar por autenticar o usuário após o registro
        Auth::login($user);

        // Retornar uma resposta JSON
        return response()->json(['message' => 'Usuário registrado com sucesso', 'user' => $user], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            return response()->json(['message' => 'Login bem-sucedido', 'token' => 'seu_token_aqui']);
        }

        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }
}
