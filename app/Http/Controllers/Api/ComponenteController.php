<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ComponenteResource;
use App\Models\Componente;
use Illuminate\Http\Request;

class ComponenteController extends Controller
{
    public function index()
    {
        return ComponenteResource::collection(
            Componente::all()
        );
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nome' => 'required|string|max:255',
            'marca' => 'nullable|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
            'imagem_catalogo' => 'nullable|string',
            'imagem_montagem' => 'nullable|string',
            'especificacoes' => 'nullable|array',
            'ativo' => 'sometimes|boolean',
        ]);

        $componente = Componente::create($dados);

        return (new ComponenteResource($componente))
            ->response()
            ->setStatusCode(201);
    }

    public function show(Componente $componente)
    {
        return new ComponenteResource($componente);
    }

    public function update(Request $request, Componente $componente)
    {
        $dados = $request->validate([
            'categoria_id' => 'sometimes|required|exists:categorias,id',
            'nome' => 'sometimes|required|string|max:255',
            'marca' => 'nullable|string|max:255',
            'modelo' => 'nullable|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'sometimes|required|numeric|min:0',
            'estoque' => 'sometimes|required|integer|min:0',
            'imagem_catalogo' => 'nullable|string',
            'imagem_montagem' => 'nullable|string',
            'especificacoes' => 'nullable|array',
            'ativo' => 'sometimes|boolean',
        ]);

        $componente->update($dados);

        return new ComponenteResource($componente);
    }

    public function destroy(Componente $componente)
    {
        $componente->delete();

        return response()->json([
            'mensagem' => 'Componente excluído com sucesso.'
        ], 200);
    }
}
