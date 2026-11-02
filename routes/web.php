
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MontadorController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/montador', [MontadorController::class, 'index'])
    ->name('montador.index');
