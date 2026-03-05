<?php

namespace App\Http\Controllers;

use App\Services\EsqueciSenhaService;
use App\Services\UsuarioService;
use Illuminate\Http\Request;

class EsqueciSenhaController extends Controller
{
    private readonly EsqueciSenhaService $esqueciSenhaService;
    private readonly UsuarioService $usuarioService;
    public function __construct(EsqueciSenhaService $esqueciSenhaService, UsuarioService $usuarioService)
    {
        $this->esqueciSenhaService = $esqueciSenhaService;
        $this->usuarioService = $usuarioService;
    }
    public function index(){
        return view('esquecisenha/index');
    }

    public function enviarEmail(Request $request){
        $email = $request->email;
        $usuarioExiste = $this->usuarioService->buscaUsuarioEmail($email);
        if($usuarioExiste){
            $this->esqueciSenhaService->enviaCodigoEmail($email);
        }else{
            return redirect()->route('esqueciSenha')->with('erro_email_esquecisenha', 'Usuário inexistente no sistema');
        }
    }
}
