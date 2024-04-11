<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposta extends Model
{
    use HasFactory;
    protected $table ='propostas';
    protected $fillable = ['orcamento_id','user_id','resposta','valor','aceita'];
    protected $casts = ['aceita'=> 'boolean'];

    public function orcamento(){
        return $this->belongsTo(Orcamento::class);
    }

    public function user(){
       return $this->belongsTo(User::class);
      
    }

}
