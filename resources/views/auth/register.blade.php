
@extends('layouts.app')

@section('title', 'Cadastro - SetupLab')

@section('content')
<section class="configurator">
    <div class="config-panel" style="max-width: 440px; margin: 40px auto;">
        <h2>Criar conta no SetupLab</h2>

        @if ($errors->any())
            <p style="color: #ff8a8a; margin-bottom: 20px;">
                {{ $errors->first() }}
            </p>
        @endif

        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div style="margin-bottom: 18px;">
                <label for="name">Nome</label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autocomplete="name"
                    style="width: 100%; padding: 14px; margin-top: 8px;"
                >
            </div>

            <div style="margin-bottom: 18px;">
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

            <div style="margin-bottom: 18px;">
                <label for="password">Senha</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    minlength="8"
                    autocomplete="new-password"
                    style="width: 100%; padding: 14px; margin-top: 8px;"
                >
            </div>

            <div style="margin-bottom: 25px;">
                <label for="password_confirmation">Confirmar senha</label>
                <input
                    id="password_confirmation"
                    type="password"
                    name="password_confirmation"
                    required
                    minlength="8"
                    autocomplete="new-password"
                    style="width: 100%; padding: 14px; margin-top: 8px;"
                >
            </div>

            <button type="submit" class="btn-primary" style="width: 100%; border: none; cursor: pointer;">
                Criar conta
            </button>
        </form>

        <p style="margin-top: 20px;">
            Já tem conta?
            <a href="{{ route('login') }}" style="color: #c084fc;">
                Entrar
            </a>
        </p>
    </div>
</section>
@endsection
