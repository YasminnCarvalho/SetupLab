<?php

namespace App\Http\Controllers;

use App\Models\Componente;
use App\Models\Montagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class MontagemController extends Controller
{
    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'componentes' => ['required', 'array', 'min:1'],
            'componentes.*.id' => ['required', 'integer', 'distinct'],
            'componentes.*.quantidade' => ['required', 'integer', 'min:1', 'max:4'],
        ]);

        $ids = collect($dados['componentes'])->pluck('id');

        $componentes = Componente::query()
            ->whereIn('id', $ids)
            ->where('ativo', true)
            ->get()
            ->keyBy('id');

        if ($componentes->count() !== $ids->count()) {
            throw ValidationException::withMessages([
                'componentes' => 'Existem componentes que não estão disponíveis no banco de dados.',
            ]);
        }

        $total = 0;

        foreach ($dados['componentes'] as $item) {
            $componente = $componentes->get($item['id']);

            if ($item['quantidade'] > $componente->estoque) {
                throw ValidationException::withMessages([
                    'componentes' => "Estoque insuficiente para {$componente->nome}.",
                ]);
            }

            $total += (float) $componente->preco * $item['quantidade'];
        }

        $montagem = DB::transaction(function () use ($request, $dados, $componentes, $total) {
            $montagem = Montagem::create([
                'user_id' => $request->user()->id,
                'nome' => $dados['nome'],
                'descricao' => null,
                'publica' => false,
                'preco_total' => round($total, 2),
            ]);

            foreach ($dados['componentes'] as $item) {
                $componente = $componentes->get($item['id']);

                $montagem->montagemComponentes()->create([
                    'componente_id' => $componente->id,
                    'quantidade' => $item['quantidade'],
                    'preco_unitario' => $componente->preco,
                ]);
            }

            return $montagem;
        });

        return response()->json([
            'message' => 'Montagem salva com sucesso!',
            'montagem_id' => $montagem->id,
        ], 201);
    }
        public function index(Request $request)
    {
        $montagens = Montagem::query()
            ->where('user_id', $request->user()->id)
            ->with('montagemComponentes.componente')
            ->latest()
            ->get();

        return view('setups.index', compact('montagens'));
    }

        public function show(Request $request, Montagem $montagem)
    {
            abort_unless(
                $montagem->user_id === $request->user()->id,
                404
            );

            $montagem->load('montagemComponentes.componente');

        return view('setups.show', compact('montagem'));
    }
        public function destroy(Request $request, Montagem $montagem)
        {
            abort_unless(
                (int) $montagem->user_id === (int) $request->user()->id,
                404
            );

            $montagem->delete();

            return redirect()
                ->route('setups.index')
                ->with('success', 'Montagem excluída com sucesso!');
        }    
        public function edit(Request $request, Montagem $montagem)
        {
            abort_unless(
                (int) $montagem->user_id === (int) $request->user()->id,
                404
            );

            $montagem->load('montagemComponentes.componente');

            $componentes = \App\Services\CatalogoComponentes::todosDoBanco();

            return view('setups.edit', compact('montagem', 'componentes'));
        }

}
