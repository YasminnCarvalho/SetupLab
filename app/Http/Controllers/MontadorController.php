<?php

namespace App\Http\Controllers;

class MontadorController extends Controller
{
    public function index()
    {
        $componentes = [
            [
                'id' => 1,
                'nome' => 'AMD Ryzen 7 7800X3D',
                'categoria' => 'processador',
                'preco' => 2699.90,
                'imagem' => 'processador.png'
            ],
            [
                'id' => 2,
                'nome' => 'Intel Core i7-13700F',
                'categoria' => 'processador',
                'preco' => 2399.90,
                'imagem' => 'processador.png'
            ],
            [
                'id' => 3,
                'nome' => 'ASUS TUF B650-PLUS',
                'categoria' => 'placa-mae',
                'preco' => 1599.90,
                'imagem' => 'placa-mae.png'
            ],
            [
                'id' => 4,
                'nome' => 'Kingston Fury 32GB DDR5',
                'categoria' => 'memoria',
                'preco' => 699.90,
                'imagem' => 'memoria.png'
            ],
            [
                'id' => 5,
                'nome' => 'GeForce RTX 4070 Super',
                'categoria' => 'placa-video',
                'preco' => 4899.90,
                'imagem' => 'placa-video.png'
            ],
        ];

        return view('montador.index', compact('componentes'));
    }
}
