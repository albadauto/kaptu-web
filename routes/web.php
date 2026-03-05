<?php

use App\Http\Controllers\PagamentoController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\UsuarioController;
use \Laravel\Cashier\Http\Controllers\WebhookController;

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::prefix('usuario')->group(function () {
    Route::get('/registro', [UsuarioController::class, 'registro'])->name('usuario.registro');
    Route::get('/registro/planos', [UsuarioController::class, 'planos'])->name('usuario.registro.planos');
    Route::post('/registro/auth', [UsuarioController::class, 'login'])->name('usuario.login');
    Route::post("/registro/criarusuario", [UsuarioController::class, 'criarUsuario'])->name('usuario.criarusuario');
});

Route::prefix('pagamento')->group(function () {
   Route::post('/checkout/{price_id}', [PagamentoController::class, 'checkout'])
       ->middleware('auth')->name('pagamento.checkout');
});

Route::get('/home', function () {
    return redirect()->route('login');
})->name('home');

Route::post('/stripe/webhook', [WebhookController::class]);
