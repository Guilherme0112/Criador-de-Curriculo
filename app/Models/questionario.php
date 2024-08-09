<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questionario extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 
        'idUser',
        'nome',
        'email',
        'telefone',
        'experiencias',
        'habilidades',
        'formacoes',
        'created_at',
        'updated_at'
    ];
}
