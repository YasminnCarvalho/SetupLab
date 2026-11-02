
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MontadorController;
use App\Http\Controllers\ComponenteController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/montador', [MontadorController::class, 'index'])
    ->name('montador.index');

Route::get('/componentes', [ComponenteController::class, 'index'])
    ->name('componentes.index');