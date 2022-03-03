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

        $setores = Pontos::distinct()->get('setor');
        $niveis = NivelRelacao::all();
        $pontos = Pontos::all();

        $linhas = array();
        foreach ($setores as $setor) {
            $linha = array('setor' => $setor->setor,
                    "X" => $pontos->where('setor', $setor->setor)->first()->X,
                    "Y" => $pontos->where('setor', $setor->setor)->first()->Y);
            // array_push($linhas, $linha);
            $soma = 0;
            $percorreNivel = array();
            foreach ($niveis as $nivel) {
                $temp = 0;
                $temp = $pontos->where('setor', $setor->setor)->where('score', $nivel->score)->sum('score') / $pontos->where('score', $nivel->score)->sum('score');
                array_push($percorreNivel, ['nivel' => $temp]);
                $soma += $temp;
            }
            array_push($linha, $percorreNivel);
            $soma / $nivel->count();
            // array_merge($linhas, ["total" => ($soma / $nivel->count())]);
            array_push($linhas, $linha);
        }


        $list = collect($linha);
        // dd($list);
        // return (new FastExcel($list))->export('file.xlsx');
        return (new FastExcel($list))->download('tabela.xlsx');
    }
}
