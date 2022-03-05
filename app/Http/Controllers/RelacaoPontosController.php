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
}
