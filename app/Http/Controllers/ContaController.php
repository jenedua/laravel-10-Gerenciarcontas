<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContaRequest;
use App\Models\Conta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpParser\Node\Stmt\TryCatch;

class ContaController extends Controller
{
    // Listar as contas
    public function index(Request $request)
    {

        // Recuperar os registros do banco dados
        $contas = Conta::when($request->has('nome'), function($whenQuery) use ($request){
            $whenQuery->where('nome', 'like', '%' . $request->nome . '%');
        })
        ->when($request->filled('data_inicio'), function($whenQuery) use ($request){
            $whenQuery->where('vencimento', '>=', \Carbon\Carbon::parse($request->data_inicio)->format('Y-m-d'));
        })
        ->when($request->filled('data_fim'), function($whenQuery) use ($request){
            $whenQuery->where('vencimento', '<=', \Carbon\Carbon::parse($request->data_fim)->format('Y-m-d'));
        })
        ->with('situacaoConta')
        ->orderByDesc('created_at')
        ->paginate(10)
        ->withQueryString(); 
        //dd($contas)  ;     

        // Carregar a VIEW
        return view('contas.index',[
            'contas' => $contas,
            'nome' => $request->nome,
            'data_inicio' => $request->data_inicio,
            'data_fim' => $request->data_fim,
        ]);
    }

    // Detalhes da conta
    public function show(Conta $conta)
    {
        
        // Carregar a VIEW
        return view('contas.show', ['conta' => $conta]);
    }

    // Carregar o formulário cadastrar nova conta
    public function create()
    {
        // Carregar a VIEW
        return view('contas.create');
    }

    // Cadastrar no banco de dados nova conta
    public function store(ContaRequest $request)
    {

        // Validar o formulário
        $request->validated();

        try {
            // Cadastrar no banco de dados na tabela contas os valores de todos os campos
        $conta = Conta::create([
            'nome' => $request->nome,
            'valor' => str_replace(',' ,'', str_replace('.', '', $request->valor)),
            'vencimento' => $request->vencimento
        ]);

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('conta.show',[ 'conta' => $conta->id ])->with('success', 'Conta cadastrada com sucesso');
            
        } catch (Exception $e) {
            Log::warning('Conta não cadastrada..', ['error' => $e->getMessage()]);

            return back()->withInput()->with('error', 'Conta não cadastrada');

            
        }

        
    }

    // Carregar o formulário editar a conta
    public function edit(Conta $conta)
    {
        // Carregar a VIEW
        return view('contas.edit', [ 'conta' => $conta]);
    }

    // Editar no banco de dados a conta
    public function update(ContaRequest $request, Conta $conta)
    {
        // Validar o formulário
        $request->validated();

        try{

            // Editar as informações do registro no banco de dados
            $conta->update([
                'nome' => $request->nome,
                'valor' => str_replace(',', '.', str_replace('.', '', $request->valor)),
                'vencimento' => $request->vencimento,
            ]);

                Log::info('Contas editado com sucesso..' ,['id' => $conta->id]);

            // Redirecionar o usuário, enviar a mensagem de sucesso
            return redirect()->route('conta.show', [ 'conta' => $conta->id ])->with('success', 'Conta editada com sucesso');
        }catch(Exception $e){
            Log::warning('Conta não editado..', ['error' => $e->getMessage()]);

            return back()->withInput()->with('error', 'Conta não editado');

        }

    }

    // Excluir a conta do banco de dados
    public function destroy(Conta $conta)
    {
        
        // Excluir o registro do banco de dados
        $conta->delete();

        // Redirecionar o usuário, enviar a mensagem de sucesso
        return redirect()->route('conta.index')->with('success', 'Conta apagada com sucesso');
    }

    public function gerarPdf(Request $request){
        // Recuperar os registros do banco de dados
        //$contas = Conta::orderByDesc('created_at')->get();
        $contas = Conta::when($request->has('nome'), function($whenQuery) use ($request){
            $whenQuery->where('nome', 'like', '%' . $request->nome . '%');
        })
        ->when($request->filled('data_inicio'), function($whenQuery) use ($request){
            $whenQuery->where('vencimento', '>=', \Carbon\Carbon::parse($request->data_inicio)->format('Y-m-d'));
        })
        ->when($request->filled('data_fim'), function($whenQuery) use ($request){
            $whenQuery->where('vencimento', '<=', \Carbon\Carbon::parse($request->data_fim)->format('Y-m-d'));
        })
        ->orderByDesc('created_at')
        ->get();

         $totalValor = $contas->sum('valor');
       
        $pdf = PDF::loadView('contas.gerar-pdf', 
        [
            'contas' => $contas,
            'totalValor' => $totalValor
            ])->setPaper('a4', 'lanscape');
        
        return $pdf->download('listar_contas.pdf');
    }

}
