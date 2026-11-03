<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('montagem_componentes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('montagem_id')
                ->constrained('montagens')
                ->cascadeOnDelete();

            $table->foreignId('componente_id')
                ->constrained('componentes')
                ->cascadeOnDelete();

            $table->integer('quantidade')->default(1);
            $table->decimal('preco_unitario', 12, 2);

            $table->timestamps();

            $table->unique(
                ['montagem_id', 'componente_id'],
                'uk_montagem_componente'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('montagem_componentes');
    }
};
