<?php

namespace App\Http\Controllers;

use App\Models\NivelRelacao;
use App\Models\Pontos;
use Rap2hpoutre\FastExcel\FastExcel;
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

    public function exportTable()
    {
        $list = collect([
            [ 'id' => 1, 'name' => 'Jane' ],
            [ 'id' => 2, 'name' => 'John' ],
        ]);

        // return (new FastExcel($list))->export('file.xlsx');
        return (new FastExcel($list))->download('tabela.xlsx');
    }


}
