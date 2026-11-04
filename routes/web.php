
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MontadorController;
use App\Http\Controllers\ComponenteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MontagemController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/montador', [MontadorController::class, 'index'])
    ->name('montador.index');

Route::get('/componentes', [ComponenteController::class, 'index'])
    ->name('componentes.index');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');

    Route::get('/cadastro', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/cadastro', [AuthController::class, 'register'])
        ->name('register.store');
});
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::post('/montagens', [MontagemController::class, 'store'])
        ->name('montagens.store');

    Route::get('/setups', [MontagemController::class, 'index'])
        ->name('setups.index');

    Route::get('/setups/{montagem}', [MontagemController::class, 'show'])
        ->name('setups.show');

    Route::delete('/setups/{montagem}', [MontagemController::class, 'destroy'])
        ->name('setups.destroy');
});