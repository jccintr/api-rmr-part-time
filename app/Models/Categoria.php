<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table ='categorias';
    protected $fillable = ['nome','imagem'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function worker(){
        return $this->hasMany(Worker::class);
    }
}
