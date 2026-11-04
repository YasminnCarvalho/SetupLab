
@extends('layouts.app')

@section('title', 'SetupLab - Monte seu PC')

@section('content')

<section class="hero">
    <div class="hero-content">
        <div class="hero-badge">
            ✦ Monte • Personalize • Salve
        </div>

        <h1>
            Crie o seu
            <span>setup ideal.</span>
        </h1>

        <p>
            Escolha seus componentes favoritos,
            monte seu computador de forma visual,
            acompanhe o valor total e salve suas montagens.
        </p>

        <div class="hero-buttons">
            <a href="{{ route('montador.index') }}" class="btn-primary">
                Montar meu PC →
            </a>
        </div>
    </div>

    <div class="hero-image">
        <img
            src="{{ asset('images/gamingpc.jpg') }}"
            alt="Computador gamer SetupLab"
        >
    </div>
</section>

<section class="features">
    <div class="feature-card">
        <div class="feature-icon">🖥️</div>
        <h3>Montagem visual</h3>
        <p>
            Escolha os componentes e visualize
            a montagem do seu computador.
        </p>
    </div>

    <div class="feature-card">
        <div class="feature-icon">💰</div>
        <h3>Cálculo de preço</h3>
        <p>
            Acompanhe o valor estimado
            da sua montagem.
        </p>
    </div>

    <div class="feature-card">
        <div class="feature-icon">💾</div>
        <h3>Salve seus setups</h3>
        <p>
            Salve suas montagens e acesse
            seus setups quando quiser.
        </p>
    </div>
</section>

@endsection
