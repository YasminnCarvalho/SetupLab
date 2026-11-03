<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('montagens', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->boolean('publica')->default(false);
            $table->decimal('preco_total', 12, 2)->default(0);

            $table->timestamps();

            $table->index(
                ['user_id', 'created_at'],
                'idx_montagens_user_created'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('montagens');
    }
};

