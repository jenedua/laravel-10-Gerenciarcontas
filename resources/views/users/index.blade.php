<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listar usuaios</title>
</head>
<body>

    <a href="{{route('user.create')}}">Cadastrar</a>

    <h2>Listar Usuários</h2>

     @forelse ($users as $user)
         ID :  {{ $user->id}} <br>
         Nome :  {{$user->name}} <br>
         E-mail : " {{$user->email}}  <br><hr>
     @empty
         <p style="color: #f00;">Nenhum usuário encontrado!</p>
     @endforelse

    
</body>
</html>
    