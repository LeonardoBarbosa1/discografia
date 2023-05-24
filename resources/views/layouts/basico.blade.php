<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title>Discografia - @yield('titulo')</title>
        <meta charset="utf-8">
        
        @stack('scripts')
    </head>
    <body>
        {{-- MENU --}}
        @include('layouts._partials.topo')
        {{-- CONTEÚDO DO CORPO --}}
        
        @yield('conteudo')
       
    </body>
</html>