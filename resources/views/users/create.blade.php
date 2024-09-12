<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/styles.css')}}">

        <title>Contas a pagar</title>
        
    </head>
    <body>
        <div class="login-container">
            <x-alert />
            <a href="{{route('user.list')}}">Listar</a><br><br>
            <h1>Cadastre-se</h1>
            <form action="{{route('user.store')}}" method="POST">
                @csrf
                @method('POST')
                <input type="text" name="name" class="form-control" id="email" placeholder="Nome Completo" value="{{ old('name')}}">
                <input type="email" name="email" class="form-control" id="email" placeholder="Digite o e-mail de usuario" value="{{ old('email')}}">
                <input type="password" name="password" id="password" placeholder="Senha com no mínimo 6 caracteres">
                <input type="text" name="cpf" id="cpf" class="cpf" placeholder="CPF" value="{{ old('cpf')}}">
                <button type="submit">Cadastrar</button>
                <a href="{{ route('conta.index') }}">Listar as Contas</a>
            </form>
        </div>
        
    </body>
</html>