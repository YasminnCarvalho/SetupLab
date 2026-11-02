
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

            @foreach([
                'processador' => 'Processador',
                'placa-mae' => 'Placa-mãe',
                'memoria' => 'Memória RAM',
                'placa-video' => 'Placa de vídeo'
            ] as $key => $label)
                <button
                    type="button"
                    class="config-category"
                    data-category="{{ $key }}">
                    <span class="category-name">{{ $label }}</span>
                    <span class="category-check">+</span>
                </button>
            @endforeach
        </aside>

        <div class="config-center">
            <div class="pc-preview">
                <div class="pc-stage">
                    <img
                        class="pc-layer pc-base"
                        src="{{ asset('images/montagem/gabinete.png') }}"
                        alt="Gabinete do computador">

                    @foreach([
                        'placa-mae',
                        'processador',
                        'memoria',
                        'placa-video'
                    ] as $layer)
                        <img
                            id="layer-{{ $layer }}"
                            class="pc-layer component-layer"
                            src="{{ asset('images/montagem/' . $layer . '.png') }}"
                            alt=""
                            hidden>
                    @endforeach
                </div>
                <p>Prévia ilustrativa da montagem</p>
            </div>

            <div class="component-picker">
                <h2 id="picker-title">Escolha seu processador</h2>

                <div class="component-grid">
                    @foreach($componentes as $componente)
                        <button
                            type="button"
                            class="component-option"
                            data-id="{{ $componente['id'] }}"
                            data-name="{{ $componente['nome'] }}"
                            data-category="{{ $componente['categoria'] }}"
                            data-price="{{ $componente['preco'] }}">

                            <img
                                src="{{ asset('images/montagem/' . $componente['imagem']) }}"
                                alt="{{ $componente['nome'] }}">

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

            <button type="button"
                    id="save-setup"
                    class="btn-primary">
                Salvar montagem
            </button>

            <p id="save-feedback" aria-live="polite"></p>
        </aside>
    </div>
</section>

<script src="{{ asset('js/montador.js') }}" defer></script>
@endsection
