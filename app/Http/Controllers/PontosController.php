<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepontosRequest;
use App\Http\Requests\UpdatepontosRequest;
use App\Models\NivelRelacao;
use App\Models\Pontos;
use App\Models\RegistroPontosSetor;
use App\Models\RelacaoPontos;
use Illuminate\Support\Facades\Artisan;
use Rap2hpoutre\FastExcel\FastExcel;

class PontosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pontos = Pontos::all();
        $relacoes = (RelacaoPontos::count() <= 0) ? 1 : 0;
        // $relacoes = (RelacaoPontos::where('nivel_id', 0)->count() >= 0) ? 1 : 0;
        $ocorrencias = Pontos::distinct()->get('ocorrencia')->count();
        return view("pontos.index")->with(compact("pontos", 'relacoes', 'ocorrencias'));
    }

    public function downloadTabelaPontos()
    {
        ini_set("max_execution_time", 600);

        $pontos = Pontos::all();

        return (new FastExcel($pontos))->download('pontos_saude.xlsx');
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
     * @param  \App\Http\Requests\StorepontosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepontosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pontos  $pontos
     * @return \Illuminate\Http\Response
     */
    public function show(pontos $pontos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pontos  $pontos
     * @return \Illuminate\Http\Response
     */
    public function edit(pontos $pontos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepontosRequest  $request
     * @param  \App\Models\pontos  $pontos
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatepontosRequest $request, pontos $pontos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pontos  $pontos
     * @return \Illuminate\Http\Response
     */
    public function destroy(pontos $pontos)
    {
        //
    }

    public function editAll(){

        $pontos = Pontos::all();
        foreach($pontos as $ponto){
            $ponto->update(["score" => is_null($ponto->relacao->nivel) ? 0 : $ponto->relacao->nivel->score]);
        }

        return redirect()->route("pontos.index");
    }

    public function zerarTabelas()
    {
        Pontos::truncate();
        RelacaoPontos::truncate();
        NivelRelacao::truncate();
        RegistroPontosSetor::truncate();
        return redirect()->route("inicio")->with('success', "Tabelas apagadas com sucesso!");
    }

    public function seedLoadingPontos()
    {
        if (Pontos::count() <= 0) {
            Artisan::call('db:seed --class=PontosSeeder');
        }

        return redirect()->route("pontos.index");
    }

    public function seedLoadingNivel()
    {
        if (NivelRelacao::count() <= 0) {
            Artisan::call('db:seed --class=NivelRelacaoSeeder');
        }

        return redirect()->route("nivel.index");
    }

}
