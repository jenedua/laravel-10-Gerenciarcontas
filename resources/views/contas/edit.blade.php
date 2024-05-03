@extends('layouts.admin')
    @section('title', 'Tela Editar')
        
  
    @section('content')

        <div class="card mt-4 mb-4 border-light shadow">
            <div class="card-header d-flex justify-content-between">
                <span>Editar Contas</span>
                <span>
                    <a href="{{ route('conta.index') }}"
                          class="btn btn-info btn-sm">Listar
                    </a>
                    <a href="{{ route('conta.show', ['conta' => $conta->id ])}}"
                          class="btn btn-primary btn-sm">Visualizar
                    </a>
                </span>
            </div>
            {{-- Verificar se existe a sessão success e imprimir o valor --}}
            <x-alert />
            @if (session('error'))
                <div class="alert alert-danger m-3" role="alert">
                        {{ session('error') }}
                </div>
            @endif
            
            <div class="card-body">
                <form action="{{ route('conta.update', ['conta' => $conta->id ])}}" method="POST" class="row g-3">
                    @csrf
                    @method('PUT')

                    <div class="col-md-12 col-sm-12">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome da conta" value="{{ old('nome', $conta->nome) }}">
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="valor" class="form-label">Valor</label>
                        <input type="text" name="valor" class="form-control" id="valor" placeholder="Usar '.' separar real do centavo" 
                        value="{{ old('valor', isset($conta->valor) ? number_format($conta->valor, '2', ',' , '.') : '') }}">
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="vencimento" class="form-label">Vencimento</label>
                        <input type="date" name="vencimento" class="form-control" id="vencimento" value="{{ old('vencimento', $conta->vencimento) }}">
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <label for="situacao_conta_id" class="form-label">Situação da conta</label>
                        <select name="situacao_conta_id" id="situacao_conta_id" class="form-select">
                            <option value="">Selecione</option>
                            @forelse ($situacoesContas as $situacaoConta)
                                <option value="{{$situacaoConta->id }}"
                                    {{ old('situacao_conta_id', $conta->situacao_conta_id) == $situacaoConta->id ? 'selected' : ''}}
                                    >{{ $situacaoConta->nome }}</option>
                            @empty
                                <option value="">Nenhuma situação da conta encontrada</option>
                            @endforelse
                        </select>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-warning btn-sm">Salvar</button>
                      </div>





                </form>

            </div>
        </div>
        {{-- <a href="{{ route('conta.create') }}">
        <button type="button" class="btn btn-success">Cadastrar</button>
        </a><br>

    <h2>Listar as Contas</h2> --}}



    @endsection
