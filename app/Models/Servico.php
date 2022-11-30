<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;
    protected $fillable = ['nome','descricao','valor_cliente','valor_profissional','unidade','horario','periodo_minimo','imagem'];
    protected $table = 'servicos';
}
