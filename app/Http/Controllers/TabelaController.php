<?php

namespace App\Http\Controllers;

use App\Models\NivelRelacao;
use App\Models\Pontos;
use App\Models\RelacaoPontos;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Http\Request;

class TabelaController extends Controller
{

    public function index()
    {
        $setores = Pontos::distinct()->get('setor');
        $niveis = NivelRelacao::all();
        $pontos = Pontos::all();

        $niveisValidos = 0;
        foreach($niveis as $nivel)
        {
            if(!is_null($nivel->existeRelacao())){
                $niveisValidos += 1;
            }
        }

        return view('tabela.index')->with(compact('setores', "niveis", 'pontos', 'niveisValidos'));
    }

    public function exportTable()
    {
        ini_set("max_execution_time", 600);

        $setores = Pontos::distinct()->get('setor');
        $niveis = NivelRelacao::all();
        $pontos = Pontos::all();

        $niveisValidos = 0;
        foreach($niveis as $nivel)
        {
            if(!is_null($nivel->existeRelacao())){
                $niveisValidos += 1;
            }
        }

        $linhas = array();
        foreach ($setores as $setor) {
            $linha = array(
                'setor' => $setor->setor,
                "X" => $pontos->where('setor', $setor->setor)->first()->X,
                "Y" => $pontos->where('setor', $setor->setor)->first()->Y
            );
            $soma = 0;
            foreach ($niveis as $nivel) {
                $temp = 0;
                if ($pontos->where('score', $nivel->score)->sum('score') > 0) {
                    $temp = $pontos->where('setor', $setor->setor)->where('score', $nivel->score)->sum('score') / $pontos->where('score', $nivel->score)->sum('score');
                }

                $linha["nivel $nivel->nivel"] = $temp;
                $soma += $temp;
            }
            // $linha['total'] = ($soma / $nivel->count());
            $linha['total'] = ($soma / $niveisValidos);
            array_push($linhas, $linha);
        }


        $list = collect($linhas);
        // return (new FastExcel($list))->export('file.xlsx');
        return (new FastExcel($list))->download('tabela.xlsx');
    }

    public function importData(Request $request)
    {

        ini_set("max_execution_time", 600);

        if($request->file('tabela') == null){
            return redirect()->route('inicio')->with("error", "Arquivo não pode ser vazio!");
        }

        if ($request->file('tabela')->extension() != "xlsx") {
            return redirect()->route('inicio')->with("error", "Arquivo invalido!");
        }

        Pontos::truncate();
        RelacaoPontos::truncate();

        (new FastExcel)->import($request->file('tabela'), function ($line) {
            Pontos::create([
                'x' => $line['x'],
                'y' => $line['y'],
                'ocorrencia' => $line['ocorrencia'],
                'bairro' => $line['bairro'],
                'setor' => $line['setor']
            ]);
        });

        return redirect()->route('pontos.index');
    }
}
