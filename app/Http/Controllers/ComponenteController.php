<?php

namespace App\Http\Controllers;

class ComponenteController extends Controller
{
    public function index()
    {
        // Dados temporários até integrar o PostgreSQL
        $componentes = [
            [
                'id' => 1,
                'nome' => 'AMD Ryzen 7 7800X3D',
                'categoria' => 'Processador',
                'preco' => 2699.90,
                'imagem' => 'processador.png',
            ],
            [
                'id' => 2,
                'nome' => 'ASUS TUF B650-PLUS',
                'categoria' => 'Placa-mãe',
                'preco' => 1599.90,
                'imagem' => 'placa-mae.png',
            ],
            [
                'id' => 3,
                'nome' => 'Kingston Fury 32GB DDR5',
                'categoria' => 'Memória RAM',
                'preco' => 699.90,
                'imagem' => 'memoria.png',
            ],
            [
                'id' => 4,
                'nome' => 'GeForce RTX 4070 Super',
                'categoria' => 'Placa de vídeo',
                'preco' => 4899.90,
                'imagem' => 'placa-video.png',
            ],
            [
                'id' => 5,
                'nome' => 'Kingston NV2 1TB',
                'categoria' => 'SSD',
                'preco' => 399.90,
                'imagem' => 'ssd.png',
            ],
            [
                'id' => 6,
                'nome' => 'Corsair RM750e 750W',
                'categoria' => 'Fonte',
                'preco' => 649.90,
                'imagem' => 'fonte.png',
            ],
            [
                'id' => 7,
                'nome' => 'Gabinete Gamer RGB',
                'categoria' => 'Gabinete',
                'preco' => 499.90,
                'imagem' => 'gabinete.png',
            ],
            [
                'id' => 8,
                'nome' => 'Kit 3 Fans RGB',
                'categoria' => 'Fans',
                'preco' => 189.90,
                'imagem' => 'fans.png',
            ],
        ];

        return view('componentes.index', compact('componentes'));
    }
}
