<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegistroPontosSetorRequest;
use App\Http\Requests\UpdateRegistroPontosSetorRequest;
use App\Models\NivelRelacao;
use App\Models\Pontos;
use App\Models\RegistroPontosSetor;

class RegistroPontosSetorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = RegistroPontosSetor::all();
        $regIndividual = RegistroPontosSetor::distinct()->get('bairro');
        return view('registro_pontos.index')->with(compact('registros', 'regIndividual'));
    }

    public function loadRegistros()
    {
        ini_set("max_execution_time", 600);
        // apaga a tabela
        RegistroPontosSetor::truncate();
        //gerar a tabela

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
            $soma = 0;
            foreach ($niveis as $nivel) {
                $temp = 0;
                if ($pontos->where('score', $nivel->score)->sum('score') > 0) {
                    $temp = $pontos->where('setor', $setor->setor)->where('score', $nivel->score)->sum('score') / $pontos->where('score', $nivel->score)->sum('score');
                }
                $soma += $temp;
            }
            $linha['total'] = ($soma / $nivel->count());
            RegistroPontosSetor::create(['setor' => $setor->setor, 'bairro' => $pontos->where('setor', $setor->setor)->first()->bairro, 'iv' => ($soma / $niveisValidos)]);
            array_push($linhas, $linha);
        }

        return redirect()->route('info.index');

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
     * @param  \App\Http\Requests\StoreRegistroPontosSetorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistroPontosSetorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegistroPontosSetor  $registroPontosSetor
     * @return \Illuminate\Http\Response
     */
    public function show(RegistroPontosSetor $registroPontosSetor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegistroPontosSetor  $registroPontosSetor
     * @return \Illuminate\Http\Response
     */
    public function edit(RegistroPontosSetor $registroPontosSetor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegistroPontosSetorRequest  $request
     * @param  \App\Models\RegistroPontosSetor  $registroPontosSetor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegistroPontosSetorRequest $request, RegistroPontosSetor $registroPontosSetor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegistroPontosSetor  $registroPontosSetor
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegistroPontosSetor $registroPontosSetor)
    {
        //
    }

}
