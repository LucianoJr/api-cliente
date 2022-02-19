<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'Nome', 'Telefone', 'CPF', 'Placa_Veiculo'
    ];
}
