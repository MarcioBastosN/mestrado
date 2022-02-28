<?php

namespace App\Http\Controllers;

use App\Models\NivelRelacao;
use App\Models\Pontos;
use Illuminate\Http\Request;

class TabelaController extends Controller
{

    public function index()
    {
        $setores = Pontos::distinct()->get('setor');
        $niveis = NivelRelacao::all();
        $pontos = Pontos::all();

        return view('tabela.index')->with(compact('setores', "niveis", 'pontos'));

    }


}
