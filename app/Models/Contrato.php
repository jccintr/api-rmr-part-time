<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
      protected $fillable = [
      'servico_id',
      'cliente_id',
      'profissional_id',
      'data',
      'data_servico',
      'local',
      'quant',
      'descricao',
      'valor_unitario_cliente',
      'valor_unitario_profissional',
      'total_cliente',
      'total_profissional',
      'status'

    ];
    protected $table = 'contratos';
}
