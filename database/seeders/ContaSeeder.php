<?php

namespace Database\Seeders;

use App\Models\Conta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!Conta::where('nome', 'manutencoes vehiculo')->first()){
            Conta::create([
                'nome' => 'manutencoes vehiculo',
                'valor' => '2000.45',
                'vencimento' => '2023-08-18',
            ]);
        }
        
    }
}
