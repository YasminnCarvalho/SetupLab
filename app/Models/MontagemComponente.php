<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MontagemComponente extends Model
{
    protected $table = 'montagem_componentes';

    protected $fillable = [
        'montagem_id',
        'componente_id',
        'quantidade',
        'preco_unitario'
    ];

    protected function casts(): array
    {
        return [
            'quantidade' => 'integer',
            'preco_unitario' => 'decimal:2'
        ];
    }

    public function montagem()
    {
        return $this->belongsTo(Montagem::class, 'montagem_id');
    }

    public function componente()
    {
        return $this->belongsTo(Componente::class, 'componente_id');
    }
}
