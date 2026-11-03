
@extends('layouts.app')

@section('title', 'Montador - SetupLab')

@section('content')
<section class="configurator">
    <div class="config-heading">
        <h1>Monte seu PC</h1>
        <p>Escolha suas peças e visualize a montagem.</p>
    </div>

    <div class="config-layout">
        <aside class="config-panel">
            <h2>Componentes</h2>

            @foreach(\App\Services\CatalogoComponentes::nomesCategorias() as $key => $label)
                <button
                    type="button"
                    class="config-category"
                    data-category="{{ $key }}"
                >
                    <span class="category-name">{{ $label }}</span>
                    <span class="category-check">+</span>
                </button>
            @endforeach
        </aside>

        <div class="config-center">
            <div class="pc-preview">
                <div class="pc-stage">
                    <img
                        id="pc-base"
                        class="pc-layer pc-base"
                        src="{{ asset('images/montagem/gabinete.png') }}"
                        alt="Gabinete do computador"
                    >

                    @foreach($componentes as $componente)
                        @if($componente['categoria'] !== 'gabinete' && $componente['categoria'] !== 'fans' && $componente['imagem_montagem'])
                            <img
                                id="layer-{{ $componente['id'] }}"
                                class="pc-layer component-layer"
                                data-component-id="{{ $componente['id'] }}"
                                data-category="{{ $componente['categoria'] }}"
                                src="{{ asset('images/montagem/' . $componente['imagem_montagem']) }}"
                                alt="{{ $componente['nome'] }}"
                                hidden
                            >
                        @endif
                    @endforeach

                    <img
                        id="layer-fans-lateral"
                        class="pc-layer component-layer"
                        data-category="fans-lateral"
                        src="{{ asset('images/montagem/fans-lateral.png') }}"
                        alt="Fans laterais"
                        hidden
                    >

                    <img
                        id="layer-fans-topo"
                        class="pc-layer component-layer"
                        data-category="fans-topo"
                        src="{{ asset('images/montagem/fans-topo.png') }}"
                        alt="Fans superiores"
                        hidden
                    >
                </div>

                <p>Prévia ilustrativa da montagem</p>
            </div>

            <div class="component-picker">
                <h2 id="picker-title">Escolha: Processador</h2>

                <div class="component-grid">
                    @foreach($componentes as $componente)
                        <button
                            type="button"
                            class="component-option"
                            data-id="{{ $componente['id'] }}"
                            data-name="{{ $componente['nome'] }}"
                            data-category="{{ $componente['categoria'] }}"
                            data-price="{{ $componente['preco'] }}"
                            data-image="{{ $componente['imagem_montagem'] ?? '' }}"
                        >
                            <img
                                src="{{ asset('images/componentes/' . $componente['imagem_catalogo']) }}"
                                alt="{{ $componente['nome'] }}"
                            >

                            <strong>{{ $componente['nome'] }}</strong>

                            <span>
                                R$ {{ number_format($componente['preco'], 2, ',', '.') }}
                            </span>

                            <small>Selecionar componente</small>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        <aside class="config-panel config-summary">
            <h2>Seu setup</h2>

            <div id="setup-items">
                <p>Nenhum componente selecionado.</p>
            </div>

            <div class="config-total">
                <span>Total estimado</span>
                <strong id="setup-total">R$ 0,00</strong>
            </div>

            <button
                type="button"
                id="save-setup"
                class="btn-primary"
            >
                Salvar montagem
            </button>

            <p id="save-feedback" aria-live="polite"></p>
        </aside>
    </div>
</section>

<script src="{{ asset('js/montador.js') }}" defer></script>
@endsection