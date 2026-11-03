<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Componente;
use Illuminate\Database\Seeder;

class CatalogoSetupLabSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['codigo' => 'PROC', 'nome' => 'Processadores', 'ordem' => 1],
            ['codigo' => 'MOBO', 'nome' => 'Placas-mãe', 'ordem' => 2],
            ['codigo' => 'RAM', 'nome' => 'Memórias RAM', 'ordem' => 3],
            ['codigo' => 'GPU', 'nome' => 'Placas de vídeo', 'ordem' => 4],
            ['codigo' => 'SSD', 'nome' => 'SSDs', 'ordem' => 5],
            ['codigo' => 'PSU', 'nome' => 'Fontes', 'ordem' => 6],
            ['codigo' => 'CASE', 'nome' => 'Gabinetes', 'ordem' => 7],
            ['codigo' => 'FAN', 'nome' => 'Ventoinhas', 'ordem' => 8],
            ['codigo' => 'HD', 'nome' => 'Discos rígidos', 'ordem' => 9],
            ['codigo' => 'COOLER', 'nome' => 'Coolers', 'ordem' => 10],
            ['codigo' => 'WATER', 'nome' => 'Water coolers', 'ordem' => 11],
        ];

        foreach ($categorias as $categoria) {
            Categoria::firstOrCreate(
                ['codigo' => $categoria['codigo']],
                [
                    'nome' => $categoria['nome'],
                    'obrigatoria' => false,
                    'ordem' => $categoria['ordem'],
                ]
            );
        }

        $produtos = [
            ['PROC', 'AMD Ryzen 7 7800X3D', 2699.90, 'processador.png', 'processador.png'],
            ['PROC', 'Intel Core i7-13700F', 2399.90, 'processador.png', 'processador.png'],
            ['MOBO', 'ASUS TUF B650-PLUS', 1599.90, 'placa-mae.png', 'placa-mae.png'],
            ['RAM', 'Kingston Fury 32GB DDR5', 699.90, 'memoria.png', 'memoria.png'],
            ['GPU', 'GeForce RTX 4070 Super', 4899.90, 'placa-video.png', 'placa-video.png'],
            ['SSD', 'Kingston NV2 1TB', 399.90, 'ssd.png', 'ssd.png'],
            ['PSU', 'Corsair RM750e 750W', 649.90, 'fonte.png', 'fonte.png'],
            ['CASE', 'Gabinete Gamer RGB', 499.90, 'gabinete.png', 'gabinete.png'],
            ['FAN', 'Kit 3 Fans RGB', 189.90, 'fans.png', 'fans.png'],
            ['HD', 'Seagate BarraCuda 2TB', 429.90, 'hd.png', null],
            ['COOLER', 'DeepCool AK400', 189.90, 'cooler.png', 'air-cooler.png'],
            ['WATER', 'Cooler Master MasterLiquid 240L', 499.90, 'water-cooler.png', 'water-cooler.png'],
        ];

        foreach ($produtos as [$codigo, $nome, $preco, $imagemCatalogo, $imagemMontagem]) {
            $categoria = Categoria::where('codigo', $codigo)->firstOrFail();

            Componente::firstOrCreate(
                [
                    'categoria_id' => $categoria->id,
                    'nome' => $nome,
                ],
                [
                    'preco' => $preco,
                    'estoque' => 10,
                    'ativo' => true,
                    'imagem_catalogo' => $imagemCatalogo,
                    'imagem_montagem' => $imagemMontagem,
                ]
            );
        }
    }
}
