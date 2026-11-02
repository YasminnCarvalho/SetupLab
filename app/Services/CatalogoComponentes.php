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
                'imagem_catalogo' => 'processador.png',
                'imagem_montagem' => 'processador.png',
            ],
            [
                'id' => 2,
                'nome' => 'Intel Core i7-13700F',
                'categoria' => 'processador',
                'preco' => 2399.90,
                'imagem_catalogo' => 'processador.png',
                'imagem_montagem' => 'processador.png',
            ],
            [
                'id' => 3,
                'nome' => 'ASUS TUF B650-PLUS',
                'categoria' => 'placa-mae',
                'preco' => 1599.90,
                'imagem_catalogo' => 'placa-mae.png',
                'imagem_montagem' => 'placa-mae.png',
            ],
            [
                'id' => 4,
                'nome' => 'Kingston Fury 32GB DDR5',
                'categoria' => 'memoria',
                'preco' => 699.90,
                'imagem_catalogo' => 'memoria.png',
                'imagem_montagem' => 'memoria.png',
            ],
            [
                'id' => 5,
                'nome' => 'GeForce RTX 4070 Super',
                'categoria' => 'placa-video',
                'preco' => 4899.90,
                'imagem_catalogo' => 'placa-video.png',
                'imagem_montagem' => 'placa-video.png',
            ],
            [
                'id' => 6,
                'nome' => 'Kingston NV2 1TB',
                'categoria' => 'ssd',
                'preco' => 399.90,
                'imagem_catalogo' => 'ssd.png',
                'imagem_montagem' => null,
            ],
            [
                'id' => 7,
                'nome' => 'Corsair RM750e 750W',
                'categoria' => 'fonte',
                'preco' => 649.90,
                'imagem_catalogo' => 'fonte.png',
                'imagem_montagem' => null,
            ],
            [
                'id' => 8,
                'nome' => 'Gabinete Gamer RGB',
                'categoria' => 'gabinete',
                'preco' => 499.90,
                'imagem_catalogo' => 'gabinete.png',
                'imagem_montagem' => 'gabinete.png',
            ],
            [
                'id' => 9,
                'nome' => 'Kit 3 Fans RGB',
                'categoria' => 'fans',
                'preco' => 189.90,
                'imagem_catalogo' => 'fans.png',
                'imagem_montagem' => 'fans.png',
            ],
            [
                'id' => 10,
                'nome' => 'Seagate BarraCuda 2TB',
                'categoria' => 'hd',
                'preco' => 429.90,
                'imagem_catalogo' => 'hd.png',
                'imagem_montagem' => null,
            ],
            [
                'id' => 11,
                'nome' => 'DeepCool AK400',
                'categoria' => 'cooler',
                'preco' => 189.90,
                'imagem_catalogo' => 'cooler.png',
                'imagem_montagem' => 'cooler.png',
            ],
            [
                'id' => 12,
                'nome' => 'Cooler Master MasterLiquid 240L',
                'categoria' => 'water-cooler',
                'preco' => 499.90,
                'imagem_catalogo' => 'water-cooler.png',
                'imagem_montagem' => 'water-cooler.png',
            ],
        ];
    }

    public static function nomesCategorias(): array
    {
        return [
            'gabinete' => 'Gabinete',
            'processador' => 'Processador',
            'placa-mae' => 'Placa-mãe',
            'memoria' => 'Memória RAM',
            'placa-video' => 'Placa de vídeo',
            'ssd' => 'SSD / Armazenamento',
            'fonte' => 'Fonte de alimentação',
            'fans' => 'Fans / Ventoinhas',
            'hd' => 'HD / Disco rígido',
            'cooler' => 'Cooler do processador',
            'water-cooler' => 'Water cooler',
        ];
    }
}
