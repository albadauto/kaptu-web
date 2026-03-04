<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Services\HistoricoService;
use App\Services\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    private UsuarioService $usuarioService;
    private HistoricoService $historicoService;
    public function __construct(UsuarioService $usuarioService, HistoricoService $historicoService)
    {
        $this->usuarioService = $usuarioService;
        $this->historicoService = $historicoService;
    }

    public function login(LoginRequest $request){
        $logado = $this->usuarioService->LogarUsuario($request);
        if($logado){
            return redirect()->route('usuario.registro.planos');
        }
        return redirect()->route('login');
    }

    public function registro(){
        return view('registro/index');
    }

    public function planos(){
        return view('registro/planos');
    }

    public function criarUsuario(CreateUserRequest $request){
        $usuario = $this->usuarioService->criarUsuario($request);
        $this->historicoService->criarHistorico($usuario->id, null, 1);
        return redirect()->route('login')->with('sucesso_registro', 'Usuário cadastrado com sucesso! Faça o login');
    }
}
