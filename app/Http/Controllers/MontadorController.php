<?php

namespace App\Http\Controllers;

use App\Services\CatalogoComponentes;

class MontadorController extends Controller
{
    public function index()
    {
        $componentes = CatalogoComponentes::todos();

        return view('montador.index', compact('componentes'));
    }
}
