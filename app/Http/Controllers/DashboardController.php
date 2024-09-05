<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // Conta o numero de usuarios que estiveram ativos no último minuto
        $activeUsers = User::where('last_active_at', '>=', Carbon::now()->subMinutes(1))->count();

        //carregar a view do dashboard e passa a contagem de usuarios ativos para a view
        return view('dashboard.index', ['activeUsers' => $activeUsers]);
        
    }
}
