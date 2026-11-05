
@extends('layouts.app')

@section('content')
<div class="setups-page">
        @if (session('success'))
    <div class="setup-success-message">
            {{ session('success') }}
    </div>
        @endif
    <div class="setups-header">
        <h1>Meus Setups</h1>
        <p>Veja as montagens que você salvou.</p>
    </div>

    @if ($montagens->isEmpty())
        <div class="setups-empty">
            <h2>Nenhuma montagem salva</h2>
            <p>Você ainda não criou nenhum setup.</p>
            <a href="{{ route('montador.index') }}" class="setups-button">
                Criar meu primeiro setup
            </a>
        </div>
    @else
        <div class="setups-grid">
            @foreach ($montagens as $montagem)
                <article class="setup-card">
                    <div class="setup-card-header">
                        <h2>{{ $montagem->nome }}</h2>
                        <span>
                            {{ $montagem->created_at->format('d/m/Y') }}
                        </span>
                    </div>

                    <div class="setup-card-components">
                        @foreach ($montagem->montagemComponentes as $item)
                            <div class="setup-component">
                                <span>
                                    {{ $item->componente?->nome ?? 'Componente indisponível' }}
                                </span>

                                <span>
                                    {{ $item->quantidade }}x
                                </span>
                            </div>
                        @endforeach
                    </div>

                    <a href="{{ route('setups.show', $montagem) }}"
                        class="setups-button"
                        style="margin-bottom: 20px;">
                            Ver detalhes
                    </a>
                    <div class="setup-card-footer">
                        <div>
                            <small>Valor total</small>
                            <strong>
                                R$ {{ number_format($montagem->preco_total, 2, ',', '.') }}
                            </strong>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
</div>
@endsection
