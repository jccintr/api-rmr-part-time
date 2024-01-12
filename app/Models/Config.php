<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $table ='config';
//    protected $fillable = ['user_id','categoria_id','proposta_id','titulo','descricao','logradouro','numero','distrito_id','concelho_id','imagem','data_execucao'];
}
