<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function loginProcess(LoginRequest $request){
        // Valida os dados do formulario usando a classe LoginRequest
        $request->validated();
        // tentar autenticar o usuario usando o email e a senha fornecidos
        $authenticated = Auth::attempt(['email' => $request->email, 'password' =>$request->password]);

        // verifica se a autenticação falhou
        if(!$authenticated){
            // redireciona de volta para  formulario de login com uma mensagem de erro
            return back()->withInput()->with('error', 'E-mail ou senha inválido!');

        }
        // recuperar o usuario autenticado do banco de dados
         $user = User::where('id', Auth::id())->first();
         // atualiza o campo last_active_at do usuario com a data e hora atuais
          $user->update(['last_active_at' => Carbon::now()]);

          // redireciona o usuario autenticado para o dashboard
          //return redirect()->route('dashboard.index');
          return redirect()->route('conta.index');
    }

    public function updateLastActive(){
        //Recuperar o usuario logado do banco de dados
        $user = User::where('id', Auth::id())->first();

        //Verificar se o usuario foi encontrado
        if($user){
            // Atualizar o campo last_active_at do usuario com a data e hora atuais
            $user->update(['last_active_at' => Carbon::now() ]);
            //Registra um log informativo da atualização do last_active_at
            Log::info('last_active_at.', [
                'user_id' =>$user->id,
                'last_active_at' =>$user->last_active_at
            ]);

            // Conta o numero de usuarios ativos nos ultimos 1 minuto
            $activeUsers = User::where('last_active_at' , '>=', Carbon::now()
                ->subMinutes(1))->count();
            
            // Retorna uma resposta JSON com status de sucesso e o numero de usuarios activos 
            return response()->json(['status' => 'success', 'activeUsers' => $activeUsers]);
        }
        // Retorna uma resposta JSON com status de erro se o usuario não foi encontrado
        return response()->json(['status' => 'error'], 401);
        
    }

    public function destroy(){
        // Salvar log

        //Log::warning('Logout', ['action_user_id' => Auth::id()]);

        // recuperar o usuario autenticado do banco de dados
        $user = User::where('id', Auth::id())->first();
        // atualiza o campo last_active_at do usuario com a data e hora atuais
         $user->update(['last_active_at' => null]);

        // Deslogar o usuario
        Auth::logout();

        // Redirecionar o usuario , enviar a mensagem de sucesso
        return redirect()->route('login.index')->with('success', 'Deslogado com sucesso!');

    }

    
    
}
