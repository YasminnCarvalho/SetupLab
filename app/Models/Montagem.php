<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Montagem extends Model
{
    protected $table = 'montagens';

    protected $fillable = [
        'user_id',
        'nome',
        'descricao',
        'publica',
        'preco_total',
    ];

    protected function casts(): array
    {
        return [
            'publica' => 'boolean',
            'preco_total' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function montagemComponentes(): HasMany
    {
        return $this->hasMany(MontagemComponente::class, 'montagem_id');
    }
}
