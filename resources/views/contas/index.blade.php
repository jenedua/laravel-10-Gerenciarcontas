    @extends('layouts.admin')
    @section('title', 'Tela de Listar')


    @section('content')

        <div class="card mt-4 mb-4 border-light shadow">
            <div class="card-header d-flex justify-content-between">
                <span>Listar Contas</span>
                <span>
                    <a href="{{ route('conta.create') }}"
                         type="button" class="btn btn-success btn-sm">Cadastrar
                    </a>
                </span>
            </div>
            {{-- Verificar se existe a sessão success e imprimir o valor --}}
            @if (session('success'))
            <div class="alert alert-success m-3" role="alert">
                <p>
                    {{ session('success') }}
                </p>
              </div>
            @endif
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Vencimento</th>
                            <th scope="col" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contas as $conta)
                            <tr>
                                <th>{{ $conta->id }}</th>
                                <td>{{ $conta->nome }}</td>
                                <td>{{ 'R$ ' . number_format($conta->valor, 2, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/Y') }}
                                </td>
                                <td class="d-md-flex justify-content-center">
                                    <a href="{{ route('conta.show', ['conta' => $conta->id]) }}"
                                         type="button" class="btn btn-primary btn-sm me-1">Visualizar
                                    </a>

                                    <a href="{{ route('conta.edit', ['conta' => $conta->id]) }}"
                                         type="button" class="btn btn-warning btn-sm me-1">Editar
                                    </a>

                                    <form action="{{ route('conta.destroy', ['conta' => $conta->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm me-1"
                                            onclick="return confirm('Tem certeza que deseja apagar este registro?')">Apagar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <span style="color: #f00;">Nenhuma conta encontrada!</span>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
        {{-- <a href="{{ route('conta.create') }}">
        <button type="button" class="btn btn-success">Cadastrar</button>
        </a><br>

    <h2>Listar as Contas</h2> --}}



    @endsection
