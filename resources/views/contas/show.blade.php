@extends('layouts.admin')
@section('title', 'Detalhes')
@section('content')

        <div class="card mt-4 mb-4 border-light shadow">
            <div class="card-header d-flex justify-content-between">
                <span>Visualizar Contas</span>
                <span>
                    <a href="{{ route('conta.index') }}"
                          class="btn btn-info btn-sm">Listar
                    </a>
                    <a href="{{ route('conta.edit', ['conta' => $conta->id]) }}"
                          class="btn btn-warning btn-sm">Editar
                    </a>
                </span>
            </div>
            {{-- Verificar se existe a sessão success e imprimir o valor --}}
            <x-alert />
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">ID</dt>
                    <dd class="col-sm-9">{{ $conta->id }}</dd>

                    <dt class="col-sm-3">Nome</dt>
                    <dd class="col-sm-9">{{ $conta->nome }}</dd>

                    <dt class="col-sm-3">Valor</dt>
                    <dd class="col-sm-9">{{ 'R$ ' . number_format($conta->valor, 2, ',', '.') }}</dd>

                    <dt class="col-sm-3">Vencimento</dt>
                    <dd class="col-sm-9">{{ \Carbon\Carbon::parse($conta->vencimento)->tz('America/Sao_Paulo')->format('d/m/Y') }}</dd>

                    <dt class="col-sm-3">Fechamento</dt>
                    <dd class="col-sm-9">{{ \Carbon\Carbon::parse($conta->fechamento)->tz('America/Sao_Paulo')->format('d/m/Y') }}</dd>

                    <dt class="col-sm-3">Situação</dt>
                    <dd class="col-sm-9">
                        <a href="{{ route('conta.change-situation', ['conta' => $conta->id])}}">
                            {!! '<span class="badge text-bg-'. $conta->situacaoConta->cor .'">'. $conta->situacaoConta->nome .'</span>' !!}
                        </a>
                    </dd>

                    <dt class="col-sm-3">Cadastrado</dt>
                    <dd class="col-sm-9">{{ \Carbon\Carbon::parse($conta->created_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }}</dd>

                    <dt class="col-sm-3">Editado</dt>
                    <dd class="col-sm-9">{{ \Carbon\Carbon::parse($conta->updated_at)->tz('America/Sao_Paulo')->format('d/m/Y H:i:s') }}</dd>
                </dl>
            </div>
        </div>
        {{-- <a href="{{ route('conta.create') }}">
        <button type="button" class="btn btn-success">Cadastrar</button>
        </a><br>

    <h2>Listar as Contas</h2> --}}



    @endsection





    
{{-- @section('content')
    


    <a href="">
        <button type="button">Listar</button>
    </a><br><br>
    <a href="">
        <button type="button">Editar</button>
    </a><br>

    <h2>Detalhes da Conta</h2>
    

    {{-- Verificar se existe a sessão success e imprimir o valor --
    @if (session('success'))
        <p style="color: #082;">
            {{ session('success') }}
        </p>
    @endif

    ID: <br>
    Nome: <br>
    Valor: <br>
    Vencimento: <br>
    Cadastrado: <br>
    Editado: <br>
@endsection --}}


