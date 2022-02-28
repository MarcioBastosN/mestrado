<?php

namespace App\Http\Controllers;

use App\Models\NivelRelacao;
use App\Http\Requests\StoreNivelRelacaoRequest;
use App\Http\Requests\UpdateNivelRelacaoRequest;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NivelRelacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $niveis = NivelRelacao::all();
        return view('nivel_relacao.index')->with(compact('niveis'));
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
     * @param  \App\Http\Requests\StoreNivelRelacaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNivelRelacaoRequest $request)
    {
        try {
            DB::transaction(fn () => NivelRelacao::create($request->all()));
            return redirect()->route('nivel.index');
        } catch (Exception $e) {
            Log::alert($e->getMessage());
            return redirect()->route('nivel.index');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NivelRelacao  $nivelRelacao
     * @return \Illuminate\Http\Response
     */
    public function show(NivelRelacao $nivelRelacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NivelRelacao  $nivelRelacao
     * @return \Illuminate\Http\Response
     */
    public function edit(NivelRelacao $nivelRelacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNivelRelacaoRequest  $request
     * @param  \App\Models\NivelRelacao  $nivelRelacao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNivelRelacaoRequest $request, $nivelRelacao)
    {

        try {
            NivelRelacao::find($nivelRelacao)->update(['score' => $request["score"]]);
        } catch (Exception $th) {
            //throw $th;
        }
        return redirect()->route("nivel.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NivelRelacao  $nivelRelacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(NivelRelacao $nivelRelacao)
    {

    }
}
