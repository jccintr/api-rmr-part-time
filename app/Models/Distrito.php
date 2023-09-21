<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;
    protected $table ='distritos';
    protected $fillable = ['nome'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function concelhos() {
        return $this->hasMany(Concelho::class);
    }
}
