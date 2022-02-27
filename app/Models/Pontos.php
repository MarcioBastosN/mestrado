<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pontos extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'x',
        'y',
        'ocorrencia',
        'bairro',
        'setor',
        'score',
    ];

    public function relacao() : HasOne
    {
        return $this->hasOne(RelacaoPontos::class, "ocorrencia", "ocorrencia");
    }

}
