<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('componentes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('categoria_id')
                ->constrained('categorias')
                ->cascadeOnDelete();

            $table->string('nome');
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->text('descricao')->nullable();
            $table->decimal('preco', 12, 2);
            $table->integer('estoque')->default(0);
            $table->string('imagem_catalogo')->nullable();
            $table->string('imagem_montagem')->nullable();
            $table->jsonb('especificacoes')->nullable();
            $table->boolean('ativo')->default(true);

            $table->timestamps();

            $table->index(
                ['categoria_id', 'ativo'],
                'idx_componentes_categoria_ativo'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('componentes');
    }
};
