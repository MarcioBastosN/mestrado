<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroPontosSetor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'setor',
        'bairro',
        'iv'
    ];
}
