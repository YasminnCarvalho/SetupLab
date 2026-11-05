<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    protected $table = 'componentes';

    protected $fillable = [
        'categoria_id',
        'nome',
        'marca',
        'modelo',
        'descricao',
        'preco',
        'estoque',
        'imagem_catalogo',
        'imagem_montagem',
        'especificacoes',
        'ativo',
    ];

    protected function casts(): array
    {
        return [
            'preco' => 'decimal:2',
            'estoque' => 'integer',
            'especificacoes' => 'array',
            'ativo' => 'boolean',
        ];
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
