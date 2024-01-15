<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $fillable = [
        'orcamento_id',
        'proposta_id',
        'valor_proposta',
        'valor_iva',
        'valor_taxa_uso',
        'valor_total_cliente',
        'valor_taxa_profissional',
        'valor_profissional',
        'payment_intent'
    ];


}
