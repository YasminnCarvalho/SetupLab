<?php

namespace App\Services;

class CatalogoComponentes
{
    public static function todos(): array
    {
        return [
            [
                'id' => 1,
                'nome' => 'AMD Ryzen 7 7800X3D',
                'categoria' => 'processador',
                'preco' => 2699.90,
                'imagem' => 'processador.png',
            ],
            [
                'id' => 2,
                'nome' => 'Intel Core i7-13700F',
                'categoria' => 'processador',
                'preco' => 2399.90,
                'imagem' => 'processador.png',
            ],
            [
                'id' => 3,
                'nome' => 'ASUS TUF B650-PLUS',
                'categoria' => 'placa-mae',
                'preco' => 1599.90,
                'imagem' => 'placa-mae.png',
            ],
            [
                'id' => 4,
                'nome' => 'Kingston Fury 32GB DDR5',
                'categoria' => 'memoria',
                'preco' => 699.90,
                'imagem' => 'memoria.png',
            ],
            [
                'id' => 5,
                'nome' => 'GeForce RTX 4070 Super',
                'categoria' => 'placa-video',
                'preco' => 4899.90,
                'imagem' => 'placa-video.png',
            ],
            [
                'id' => 6,
                'nome' => 'Kingston NV2 1TB',
                'categoria' => 'ssd',
                'preco' => 399.90,
                'imagem' => 'ssd.png',
            ],
            [
                'id' => 7,
                'nome' => 'Corsair RM750e 750W',
                'categoria' => 'fonte',
                'preco' => 649.90,
                'imagem' => 'fonte.png',
            ],
            [
                'id' => 8,
                'nome' => 'Gabinete Gamer RGB',
                'categoria' => 'gabinete',
                'preco' => 499.90,
                'imagem' => 'gabinete.png',
            ],
            [
                'id' => 9,
                'nome' => 'Kit 3 Fans RGB',
                'categoria' => 'fans',
                'preco' => 189.90,
                'imagem' => 'fans.png',
            ],
            [
                'id' => 10,
                'nome' => 'Seagate BarraCuda 2TB',
                'categoria' => 'hd',
                'preco' => 429.90,
                'imagem' => 'hd.png',
            ],
            [
                'id' => 11,
                'nome' => 'DeepCool AK400',
                'categoria' => 'cooler',
                'preco' => 189.90,
                'imagem' => 'cooler.png',
            ],
            [
                'id' => 12,
                'nome' => 'Cooler Master MasterLiquid 240L',
                'categoria' => 'water-cooler',
                'preco' => 499.90,
                'imagem' => 'water-cooler.png',
            ],
        ];
    }

    public static function nomesCategorias(): array
    {
        return [
            'processador' => 'Processador',
            'placa-mae' => 'Placa-mãe',
            'memoria' => 'Memória RAM',
            'placa-video' => 'Placa de vídeo',
            'ssd' => 'SSD',
            'fonte' => 'Fonte',
            'gabinete' => 'Gabinete',
            'fans' => 'Fans',
        ];
    }
}
