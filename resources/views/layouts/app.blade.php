
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'SetupLab')</title>

    <link rel="stylesheet"
          href="{{ asset('css/setuplab.css') }}">
</head>

<body>

    <header class="navbar">
        <a href="/" class="logo">
            <span class="logo-icon">⬡</span>
            Setup<span>Lab</span>
        </a>

        <nav class="nav-links">
            <a href="/">Início</a>
            <a href="/montador">Montador</a>
            <a href="/componentes">Componentes</a>
            <a href="/comunidade">Comunidade</a>
        </nav>

        <div class="nav-actions">
            <a href="/setups" class="btn-outline">
                Meus Setups
            </a>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <p>
            © {{ date('Y') }} SetupLab.
            Monte, personalize e compartilhe.
        </p>
    </footer>

</body>
</html>
