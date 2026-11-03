<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'codigo',
        'nome',
        'obrigatoria',
        'ordem',
    ];

    protected function casts(): array
    {
        return [
            'obrigatoria' => 'boolean',
            'ordem' => 'integer',
        ];
    }

    public function componentes()
    {
        return $this->hasMany(Componente::class, 'categoria_id');
    }
}