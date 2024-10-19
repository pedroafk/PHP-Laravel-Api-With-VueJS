<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Adicione a importação da classe Controller
use App\Http\Controllers\Controller; // <-- Esta linha deve ser adicionada

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validação das credenciais
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Autenticar o usuário
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Autenticação bem-sucedida
            $user = Auth::user();
            // Você pode gerar um token ou retornar uma resposta aqui
            return response()->json(['message' => 'Login bem-sucedido', 'token' => 'seu_token_aqui']);
        }

        // Se falhar
        return response()->json(['message' => 'Credenciais inválidas'], 401);
    }
}
