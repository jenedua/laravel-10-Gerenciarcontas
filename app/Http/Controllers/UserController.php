<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    public function list(){

        // Listar os Usuarios
        $users = User::orderByDesc('created_at')->get();
    
        return view('users.index', ['users' =>$users]);
    }

    public function create(){

        //carregar a view
        return view('users.create');
    }

    public function store(UserRequest $request){
        // Validar o formulario
        $request->validated();
        // Marca o ponto inicial de uma transação
        DB::beginTransaction();

        try {

            // Casdastrar no banco de dados na tabela usuarios
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>$request->password,
                'cpf' => preg_replace('/[^0-9]/', '', $request->cpf),

            ]);
            // Operação é concluida com exito
            DB::commit();
            //Redirecionar o usuario, enviar a mensagem de sucesso
           return redirect()->route('user.list' ,['user' => $user->id])->with('success', 'Usuario cadastrado com sucesso!');



        } catch (Exception $e) {
            // Operação não é concluida com exito
            DB::rollBack();

            // Redirecionar o usuário, enviar a mensagem de erro
            return back()->withInput()->with('error', 'Usuario não cadastrado!'. $e->getMessage());
        }


    }

}
