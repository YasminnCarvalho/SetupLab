
@extends('layouts.app')

@section('title', 'Entrar - SetupLab')

@section('content')
<section class="configurator">
    <div class="config-panel" style="max-width: 440px; margin: 40px auto;">
        <h2>Entrar no SetupLab</h2>

        @if ($errors->any())
            <p style="color: #ff8a8a; margin-bottom: 20px;">
                {{ $errors->first() }}
            </p>
        @endif

        <form method="POST" action="{{ route('login.store') }}">
            @csrf

            <div style="margin-bottom: 20px;">
                <label for="email">E-mail</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                    style="width: 100%; padding: 14px; margin-top: 8px;"
                >
            </div>

            <div style="margin-bottom: 25px;">
                <label for="password">Senha</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    style="width: 100%; padding: 14px; margin-top: 8px;"
                >
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; border: none; cursor: pointer;">
                Entrar
            </button>
        </form>

        <p style="margin-top: 20px;">
            Ainda não tem conta?
            <a href="{{ route('register') }}" style="color: #c084fc;">
                Cadastre-se
            </a>
        </p>
    </div>
</section>
@endsection
