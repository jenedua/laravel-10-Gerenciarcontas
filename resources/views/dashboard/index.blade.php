<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Fedner - dashboard</title>
        
    </head>
    <body>

        <h1>Projeto Laravel Dashboard</h1>
         
        <p>Quantidade de usuario online logado: <span id="quantidadeUsuarioOnlineLogado">{{$activeUsers}}</span> </p>
        {{-- <a href="{{ route('conta.index') }}">Listar as Contas</a> --}}
        <a href="{{ route('login.destroy')}}">Sair</a>

        {{-- Incluir o arquivo JS --}}

        <script src="{{ asset('js/custom.js')}}"></script>
        
    </body>
</html>
