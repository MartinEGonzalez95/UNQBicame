<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>UNQBicame - Administrador</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">

                <div class="title m-b-md">
                    UNQBicame
                </div>

                <div class="links">
                    <a href="{{ route('aulas.index') }}">Aulas</a>
                    <a href="{{ route('materias.index') }}">Materias</a>
                    <a href="{{ route('cursadas.index') }}">Cursadas</a>
                </div>

                <div class="container">
                    @yield('content')
                </div>

            </div>
        </div>
    </body>
</html>
