<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelRelacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nivel',
        'score',
    ];

    public function existeRelacao()
    {
        return $this->hasMany(RelacaoPontos::class, 'nivel_id', 'id');
    }
}
