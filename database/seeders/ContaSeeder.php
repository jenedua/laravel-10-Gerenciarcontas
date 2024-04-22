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
        if(!Conta::where('nome', 'condominio')->first()){
            Conta::create([
                'nome' => 'condominio',
                'valor' => '280.45',
                'vencimento' => '2023-03-18',
            ]);
        }
        if(!Conta::where('nome', 'gás')->first()){
            Conta::create([
                'nome' => 'gás',
                'valor' => '75.45',
                'vencimento' => '2024-04-13',
            ]);
        }
        if(!Conta::where('nome', 'comida')->first()){
            Conta::create([
                'nome' => 'comida',
                'valor' => '445.45',
                'vencimento' => '2024-04-18',
            ]);
        }
        if(!Conta::where('nome', 'celular')->first()){
            Conta::create([
                'nome' => 'celular',
                'valor' => '145.45',
                'vencimento' => '2024-04-11',
            ]);
        }
    }
}
