
@extends('layouts.app')

@section('title', 'SetupLab - Monte seu PC')

@section('content')

<section class="hero">

    <div class="hero-content">

        <div class="hero-badge">
            ✦ Monte • Planeje • Compartilhe
        </div>

        <h1>
            Crie o seu
            <span>setup ideal.</span>
        </h1>

        <p>
            Escolha os melhores componentes,
            verifique a compatibilidade,
            calcule o valor total e compartilhe
            sua montagem com a comunidade.
        </p>

        <div class="hero-buttons">
            <a href="/montador" class="btn-primary">
                Montar meu PC →
            </a>

            <a href="/comunidade" class="btn-outline">
                Explorar setups
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
        <div class="feature-icon">⚙️</div>
        <h3>Compatibilidade</h3>
        <p>
            Escolha componentes e descubra
            se as peças funcionam juntas.
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
        <div class="feature-icon">👥</div>
        <h3>Comunidade</h3>
        <p>
            Compartilhe suas montagens
            e conheça setups de outras pessoas.
        </p>
    </div>

</section>

@endsection
