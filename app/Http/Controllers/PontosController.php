<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorepontosRequest;
use App\Http\Requests\UpdatepontosRequest;
use App\Models\Pontos;

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
        return view("pontos.index")->with(compact("pontos"));
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
}
