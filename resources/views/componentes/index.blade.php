
@extends('layouts.app')

@section('title', 'Componentes - SetupLab')

@section('content')

<section class="catalog-page">

    <header class="catalog-heading">
        <span class="catalog-eyebrow">
            HARDWARE
        </span>

        <h1>Explore os componentes</h1>

        <p>
            Escolha as melhores peças para
            montar seu próximo PC.
        </p>
    </header>

    <div class="catalog-toolbar">

        <input
            type="search"
            id="component-search"
            placeholder="Buscar componentes..."
        >

        <select id="category-filter">
            <option value="">Todas as categorias</option>

            @foreach($categorias as $codigo => $nome)
                <option value="{{ $codigo }}">
                    {{ $nome }}
                </option>
            @endforeach
        </select>

    </div>

    <div class="catalog-grid">

        @foreach($componentes as $componente)

            <article
                class="catalog-card"
                data-name="{{ mb_strtolower($componente['nome']) }}"
                data-category="{{ $componente['categoria'] }}"
            >

                <div class="catalog-image">

                    <img
                        src="{{ asset('images/componentes/' . $componente['imagem_catalogo']) }}"
                        alt="{{ $componente['nome'] }}"
                        loading="lazy"
                        onerror="this.style.display='none'"
                    >

                </div>

                <div class="catalog-info">

                    <span class="catalog-tag">
                        {{ $categorias[$componente['categoria']] ?? $componente['categoria'] }}
                    </span>

                    <h3>{{ $componente['nome'] }}</h3>

                    <strong class="catalog-price">
                        R$ {{ number_format($componente['preco'], 2, ',', '.') }}
                    </strong>

                    <a
                        href="{{ route('montador.index') }}"
                        class="catalog-button"
                    >
                        Montar meu PC
                    </a>

                </div>

            </article>

        @endforeach

    </div>

    <p id="catalog-empty" hidden>
        Nenhum componente encontrado.
    </p>

</section>

<script src="{{ asset('js/componentes.js') }}" defer></script>

@endsection
