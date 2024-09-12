<?php

use App\Http\Controllers\ContaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/logout',[LoginController::class, 'destroy'])->name('login.destroy');


Route::get('/list-user', [UserController::class,'list'])->name('user.list');
Route::get('/create-user', [UserController::class,'create'])->name('user.create');
Route::post('/store-user', [UserController::class, 'store'])->name('user.store');

// Atualiza horario de acesso
Route::post('/update-last-active', [LoginController::class, 'updateLastActive']);

//verificar se o usuario esta logado
Route::group(['middleware' => 'auth'], function (){
    

    //Route::get('/index-dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // CONTAS
    Route::get('/index-conta', [ContaController::class, 'index'])->name('conta.index');
    Route::get('/create-conta', [ContaController::class, 'create'])->name('conta.create');
    Route::post('/store-conta', [ContaController::class, 'store'])->name('conta.store');
    Route::get('/show-conta/{conta}', [ContaController::class, 'show'])->name('conta.show');
    Route::get('/edit-conta/{conta}', [ContaController::class, 'edit'])->name('conta.edit');
    Route::put('/update-conta/{conta}', [ContaController::class, 'update'])->name('conta.update');
    Route::delete('/destroy-conta/{conta}', [ContaController::class, 'destroy'])->name('conta.destroy');
    Route::get('/change-situation-conta/{conta}', [ContaController::class, 'changeSituation'])->name('conta.change-situation');
    
    Route::get('/gerar-pdf-conta', [ContaController::class, 'gerarPdf'])->name('conta.gerar-pdf');
    Route::get('/gerar-csv-conta', [ContaController::class, 'gerarCsv'])->name('conta.gerar-csv');
});
