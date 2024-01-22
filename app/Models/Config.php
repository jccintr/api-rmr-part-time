<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $table ='config';
    protected $fillable = ['percentual_iva','percentual_cliente','percentual_profissional','telefone_whats'];
}
