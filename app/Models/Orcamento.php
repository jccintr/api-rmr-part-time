<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    use HasFactory;
    protected $table ='orcamentos';
    protected $fillable = ['user_id','categoria_id','titulo','descricao','logradouro','numero','distrito_id','concelho_id','imagem'];


    public function categoria(){
        
        return $this->hasOne(Categoria::class,'id','categoria_id');
    }

    public function propostas(){
        return $this->hasMany(Proposta::class);
    }

    
}
