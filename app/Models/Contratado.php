<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contratado extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','servico_id','ativo'];
    protected $table = 'contratados';
}
