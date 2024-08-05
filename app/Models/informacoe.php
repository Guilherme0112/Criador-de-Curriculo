<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informacoe extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title',
        'descricao',
        'created_at',
        'updated_at'
    ];
}
