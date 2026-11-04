<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ComponenteApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_lista_componentes_com_sucesso(): void
    {
        $response = $this->getJson('/api/componentes');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data',
            ]);
    }

    public function test_cadastra_componente_com_sucesso(): void
    {
        $categoriaId = $this->criarCategoria();

        $response = $this->postJson('/api/componentes', [
            'categoria_id' => $categoriaId,
            'nome' => 'Componente de Teste',
            'marca' => 'Marca Teste',
            'modelo' => 'Modelo 123',
            'preco' => 199.90,
            'estoque' => 5,
            'ativo' => true,
        ]);

        $response->assertStatus(201)
            ->assertJsonPath('data.nome', 'Componente de Teste');

        $this->assertDatabaseHas('componentes', [
            'nome' => 'Componente de Teste',
        ]);
    }

    public function test_consulta_componente_especifico(): void
    {
        $componenteId = $this->cadastrarComponente();

        $response = $this->getJson("/api/componentes/{$componenteId}");

        $response->assertStatus(200)
            ->assertJsonPath('data.nome', 'Componente de Teste');
    }

    public function test_atualiza_componente_com_sucesso(): void
    {
        $componenteId = $this->cadastrarComponente();

        $response = $this->patchJson("/api/componentes/{$componenteId}", [
            'nome' => 'Componente Atualizado',
            'preco' => 299.90,
        ]);

        $response->assertStatus(200)
            ->assertJsonPath('data.nome', 'Componente Atualizado');

        $this->assertDatabaseHas('componentes', [
            'id' => $componenteId,
            'nome' => 'Componente Atualizado',
        ]);
    }

    public function test_exclui_componente_com_sucesso(): void
    {
        $componenteId = $this->cadastrarComponente();

        $response = $this->deleteJson("/api/componentes/{$componenteId}");

        $response->assertStatus(200)
            ->assertJson([
                'mensagem' => 'Componente excluído com sucesso.',
            ]);

        $this->assertDatabaseMissing('componentes', [
            'id' => $componenteId,
        ]);
    }

    private function criarCategoria(): int
    {
        return DB::table('categorias')->insertGetId([
            'codigo' => 'TESTE',
            'nome' => 'Categoria de Teste',
            'obrigatoria' => true,
            'ordem' => 1,
        ]);
    }

    private function cadastrarComponente(): int
    {
        $response = $this->postJson('/api/componentes', [
            'categoria_id' => $this->criarCategoria(),
            'nome' => 'Componente de Teste',
            'marca' => 'Marca Teste',
            'modelo' => 'Modelo 123',
            'preco' => 199.90,
            'estoque' => 5,
            'ativo' => true,
        ]);

        $response->assertStatus(201);

        return $response->json('data.id');
    }
}
