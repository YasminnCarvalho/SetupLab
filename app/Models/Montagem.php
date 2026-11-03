<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Montagem extends Model
{
    protected $table = 'montagens';

    protected $fillable = [
        'user_id',
        'nome',
        'descricao',
        'publica',
        'preco_total'
    ];

    protected function casts(): array
    {
        return [
            'publica' => 'boolean',
            'preco_total' => 'decimal:2'
        ];
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function itens()
    {
        return $this->hasMany(MontagemComponente::class, 'montagem_id');
    }
}
