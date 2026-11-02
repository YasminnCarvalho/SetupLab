<?php

namespace App\Http\Controllers;

use App\Services\CatalogoComponentes;

class ComponenteController extends Controller
{
    public function index()
    {
        $componentes = CatalogoComponentes::todos();

        $categorias = CatalogoComponentes::nomesCategorias();

        return view('componentes.index', compact(
            'componentes',
            'categorias'
        ));
    }
}
