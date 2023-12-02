<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $table ='workers';
    protected $fillable = ['user_id','categoria_id'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function user(){
        return $this->hasOne(User::class,'id','user_id');
       }
}
