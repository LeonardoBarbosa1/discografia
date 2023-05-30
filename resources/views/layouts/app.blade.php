<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Discografia - @yield('titulo')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

   
    <style>
        .bg-image {
            background: url('{{ asset('img/background.png') }}') no-repeat center center fixed;
            background-size: cover;
            
        }
    </style>
     <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    @stack('scripts')
    
    @vite(['resources/js/app.js'])

</head>
<body class="bg-image " >
    <div id="app">
        {{-- Menu --}}
        @include('layouts._partials.topo')


        {{-- Conteúdo --}}
        <main >
            @yield('conteudo')
        </main>
    </div>
</body>
</html>