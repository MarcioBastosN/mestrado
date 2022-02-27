<?php

namespace App\Http\Controllers;

use App\Models\RelacaoPontos;
use App\Http\Requests\StoreRelacaoPontosRequest;
use App\Http\Requests\UpdateRelacaoPontosRequest;

class RelacaoPontosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $relacoes = RelacaoPontos::all();
        return view("relacao_pontos.index")->with(compact('relacoes'));
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
        $relacoes_ponto->update($request->all());
        return redirect()->route("relacoes_pontos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RelacaoPontos  $relacaoPontos
     * @return \Illuminate\Http\Response
     */
    public function destroy(RelacaoPontos $relacaoPontos)
    {
        //
    }
}
