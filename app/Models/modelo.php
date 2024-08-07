<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modelo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nomeDoModelo',
        'html',
        'created_at',
        'updated_at'
    ];
}
