<?php

use App\Http\Controllers\NivelRelacaoController;
use App\Http\Controllers\PontosController;
use App\Http\Controllers\RelacaoPontosController;
use App\Http\Controllers\TabelaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("inicio");

Route::resource('pontos', PontosController::class);
Route::post('pontos/editar', [PontosController::class, "editAll"])->name("pontos.alterar");
Route::resource('relacoes_pontos', RelacaoPontosController::class);
Route::post('relacoes_pontos/loadData', [RelacaoPontosController::class, 'loadData'])->name("relacoes_pontos.load");
Route::resource('nivel', NivelRelacaoController::class);
Route::get('tabela', [TabelaController::class, 'index'])->name('tabela');
Route::get('tabela/download', [TabelaController::class, 'exportTable'])->name('exportTable');


