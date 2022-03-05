<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RelacaoPontos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ocorrencia',
        'nivel_id',
    ];

    public function nivel() : HasOne
    {
        return $this->hasOne(NivelRelacao::class, 'id', 'nivel_id');
    }

    public function ocorrencias() :HasMany
    {
        return $this->hasMany(Pontos::class, 'ocorrencia', 'ocorrencia');
    }
}
