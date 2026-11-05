<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ComponenteController;

Route::apiResource('componentes', ComponenteController::class);
