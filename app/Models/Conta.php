<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    use HasFactory;

    // Indicar o nome da tabela
    protected $table = 'contas';

    // Indicar quais colunas podem ser cadastrada
    protected $fillable = ['nome', 'valor', 'vencimento'];
}
