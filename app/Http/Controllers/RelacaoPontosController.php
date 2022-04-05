<?php

namespace App\Http\Controllers;

use App\Models\RelacaoPontos;
use App\Http\Requests\StoreRelacaoPontosRequest;
use App\Http\Requests\UpdateRelacaoPontosRequest;
use App\Models\NivelRelacao;
use App\Models\Pontos;

class RelacaoPontosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relacoes = RelacaoPontos::orderBy('nivel_id', 'DESC')->get();
        $niveis = NivelRelacao::all();
        $pontos = Pontos::count();
        return view("relacao_pontos.index")->with(compact('relacoes', 'niveis', 'pontos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRelacaoPontosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRelacaoPontosRequest $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RelacaoPontos  $relacaoPontos
     * @return \Illuminate\Http\Response
     */
    public function show(RelacaoPontos $relacaoPontos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RelacaoPontos  $relacaoPontos
     * @return \Illuminate\Http\Response
     */
    public function edit(RelacaoPontos $relacaoPontos)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRelacaoPontosRequest  $request
     * @param  \App\Models\RelacaoPontos  $relacaoPontos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRelacaoPontosRequest $request, RelacaoPontos $relacoes_ponto)
    {
        try {
            $relacoes_ponto->update($request->all());
        } catch (\Throwable $th) {
            //throw $th;
        }
        return redirect()->route("relacoes_pontos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RelacaoPontos  $relacaoPontos
     * @return \Illuminate\Http\Response
     */
    public function destroy($relacaoPontos)
    {
        $relacao = RelacaoPontos::find($relacaoPontos);
        Pontos::where('ocorrencia', $relacao->ocorrencia)->delete();
        $relacao->delete();
        return redirect()->route("relacoes_pontos.index");
    }

    public function loadData()
    {
        $pontos = Pontos::distinct()->get('ocorrencia');
        foreach($pontos as $ponto){
            try {
                RelacaoPontos::create(['ocorrencia' => $ponto->ocorrencia, 'nivel_id' => 1]);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        return redirect()->route('relacoes_pontos.index');
    }

    public function nivelDefinido()
    {
        $dados = RelacaoPontos::all();
        foreach($dados as $valores){
            // $valores->update(["nivel_id" => 2]);
            switch(trim($valores->ocorrencia)){
                case "E05.MAUS TRATOS A IDOSOS":
                    $valores->update(["nivel_id" => 1]);
                break;
                case "E04.MAUS TRATOS A CRIANÇAS/ADOLESCENTES":
                    $valores->update(["nivel_id" => 1]);
                break;
                case "A05.VIAS DE FATO/AGRESSÃO":
                $valores->update(["nivel_id" => 2]);
                break;
                case "I02.CONFLITO FAMILIAR":
                $valores->update(["nivel_id" => 3]);
                break;
                case "E03.LESÕES CORPORAIS (EXCLUSIVE TRANSITO)":
                $valores->update(["nivel_id" => 4]);
                break;
                case "E08.TENTATIVA DE HOMICIDIO":
                $valores->update(["nivel_id" => 5]);
                break;
                case "C03.ESTUPRO":
                $valores->update(["nivel_id" => 6]);
                break;
                case "C04.ESTUPRO DE VULNERAVEL":
                $valores->update(["nivel_id" => 6]);
                break;
                case "H12.VIOLENCIA DOMESTICA E FAMILIAR CONTRA A MULHER":
                    $valores->update(["nivel_id" => 7]);
                break;
                case "D01.HOMICIDIO":
                    $valores->update(["nivel_id" => 8]);
                break;
                case "D03.OUTROS CRIMES RESULTANTES EM MORTE":
                    $valores->update(["nivel_id" => 8]);
                break;

            }
        }
        return redirect()->route('relacoes_pontos.index');
    }
}
