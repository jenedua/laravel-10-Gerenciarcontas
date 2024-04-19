<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('images/imagemteste.ico')}}">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <title>@yield('title')</title>

</head>

<body>
    <header class="p-3 text-bg-secondary">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="#" class="nav-link px-2 text-white">Home</a></li>
              <li><a href="{{ route('conta.index') }}" class="nav-link px-2 text-white">Contas</a></li>
            </ul>
    
            <div class="text-end">
              <button type="button" class="btn btn-warning">Login</button>
            </div>
          </div>
        </div>
      </header>
      <div class="container">

          @yield('content')
      </div>
    <script src="{{ asset('js/custom.js') }}"></script>

</body>

</html>