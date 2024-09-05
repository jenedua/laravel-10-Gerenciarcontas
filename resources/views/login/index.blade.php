<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/styles.css')}}">

        <title>Contas a pagar</title>
        
    </head>
    <body>
        <div class="login-container">
            <h1>Login</h1>
            <form action="{{route('login.process')}}" method="POST">
                @csrf
                @method('POST')
                <input type="email" name="email" class="form-control" id="email" placeholder="Digite o e-mail de usuario" value="{{ old('email')}}">
                <input type="password" name="password" id="password" placeholder="Digite a senha">
                <button type="submit">Entrar</button>
            </form>
            <div class="forgot-password">
                <a href="#">Esqueceu sua senha?</a>
            </div>
        </div>
        {{-- <form action="{{route('login.process')}}" method="POST">
            @csrf
            @method('POST') --}}

            {{-- <label for="email"> E-mail</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Digite o e-mail de usuario" value="{{ old('email')}}"><br><br>
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" placeholder="Digite a senha"><br><br>
            <button type="submit">Acessar</button> --}}
            
        {{-- </form> --}}

        {{-- <a href="{{ route('conta.index') }}">Listar as Contas</a> --}}
        
    </body>
</html>
