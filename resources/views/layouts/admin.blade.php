<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="https://sse.unimontrer.edu.mx/images/logo.png" alt="{{ config('app.name', 'UNIMO') }}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <a href="{{ url('/admin') }}" class="{{ request()->is('/admin') ? 'nav-item nav-link active' : 'nav-item nav-link' }}">
                            <div class="d-inline-block icons-sm mr-1"><i class="fal fa-home"></i></div>
                            <span>Administrador</span>
                        </a>
                        <a href="{{ url('/admin/users') }}" class="{{ request()->is('/admin/users') ? 'nav-item nav-link active' : 'nav-item nav-link' }}">
                            <div class="d-inline-block icons-sm mr-1"><i class="fal fa-users"></i></div>
                            <span>Usuarios</span>
                        </a>
                        <a href="{{ url('/admin/crear') }}" class="{{ request()->is('/admin/crear') ? 'nav-item nav-link active' : 'nav-item nav-link' }}">
                            <div class="d-inline-block icons-sm mr-1"><i class="fal fa-list-ol"></i></div>
                            <span>Crear</span>
                        </a>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('salir') }}">
                                       Salir
                                    </a>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
