<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concelho extends Model
{
    use HasFactory;
    protected $table ='concelhos';
    protected $fillable = ['nome','distrito_id'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /*
    public function distrito(){
        return $this->hasOne(Distrito::class,'id','distrito_id');
       }
*/
       public function distrito(){
        return $this->belongsTo(Distrito::class);
       }
}
