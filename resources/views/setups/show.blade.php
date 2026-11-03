
@extends('layouts.app')

@section('content')
<div class="setups-page">
    <div class="setups-header">
        <a href="{{ route('setups.index') }}" class="setups-button">
            Voltar para Meus Setups
        </a>

        <h1 style="margin-top: 24px;">
            {{ $montagem->nome }}
        </h1>

        <p>
            Criado em {{ $montagem->created_at->format('d/m/Y') }}
        </p>
    </div>

    <article class="setup-card">
        <h2>Componentes da montagem</h2>

        <div class="setup-card-components" style="margin-top: 24px;">
            @foreach ($montagem->montagemComponentes as $item)
                <div class="setup-component">
                    <div>
                        <strong>
                            {{ $item->componente?->nome ?? 'Componente indisponível' }}
                        </strong>

                        <p>Quantidade: {{ $item->quantidade }}</p>
                    </div>

                    <span>
                        R$ {{ number_format($item->preco_unitario * $item->quantidade, 2, ',', '.') }}
                    </span>
                </div>
            @endforeach
        </div>

        <div class="setup-card-footer">
            <small>Valor total da montagem</small>

            <strong>
                R$ {{ number_format($montagem->preco_total, 2, ',', '.') }}
            </strong>
        </div>
    </article>
</div>
@endsection
