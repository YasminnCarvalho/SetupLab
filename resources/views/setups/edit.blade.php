
@extends('layouts.app')

@section('content')
<div class="setups-page">
    <div class="setups-header">
        <a href="{{ route('setups.show', $montagem) }}" class="setups-button">
            Voltar
        </a>

        <h1 style="margin-top: 24px;">Editar montagem</h1>
        <p>Altere o nome da montagem e confira os componentes salvos.</p>
    </div>

    <article class="setup-card">
        <div class="setup-card-components">
            <label for="nome-montagem">Nome da montagem</label>

            <input
                type="text"
                id="nome-montagem"
                value="{{ $montagem->nome }}"
                maxlength="255"
                class="setup-edit-input"
            >

            <h2>Componentes atuais</h2>

            @foreach ($montagem->montagemComponentes as $item)
                <div class="setup-component">
                    <span>
                        {{ $item->componente?->nome ?? 'Componente indisponível' }}
                    </span>

                    <span>{{ $item->quantidade }}x</span>
                </div>
            @endforeach
        </div>

        <div class="setup-card-footer">
            <small>Valor atual</small>

            <strong>
                R$ {{ number_format($montagem->preco_total, 2, ',', '.') }}
            </strong>
        </div>

        <p style="margin-top: 20px;">
            A edição dos componentes será habilitada na próxima etapa.
        </p>
    </article>
</div>
@endsection
