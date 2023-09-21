<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    use HasFactory;
    protected $table ='orcamentos';
    protected $fillable = ['user_id','categoria_id','descricao','logradouro','numero','distrito_id','concelho_id','imagem'];

}
