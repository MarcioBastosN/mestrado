<?php

use App\Http\Controllers\NivelRelacaoController;
use App\Http\Controllers\PontosController;
use App\Http\Controllers\RegistroPontosSetorController;
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
Route::post('pontos/erase', [PontosController::class, "zerarTabelas"])->name("pontos.erase");
Route::post('pontos/seedLoadingPontos', [PontosController::class, "seedLoadingPontos"])->name("pontos.seedLoadingPontos");
Route::post('pontos/seedLoadingNivel', [PontosController::class, "seedLoadingNivel"])->name("pontos.seedLoadingNivel");
Route::resource('relacoes_pontos', RelacaoPontosController::class);
Route::post('relacoes_pontos/loadData', [RelacaoPontosController::class, 'loadData'])->name("relacoes_pontos.load");
Route::post('relacoes_pontos/nivelDefinido', [RelacaoPontosController::class, 'nivelDefinido'])->name("nivel_definido.load");
Route::resource('nivel', NivelRelacaoController::class);
Route::get('tabela', [TabelaController::class, 'index'])->name('tabela');
Route::get('tabela/download', [TabelaController::class, 'exportTable'])->name('exportTable');
Route::post('tabela/importData', [TabelaController::class, 'importData'])->name('importData');
Route::resource('info', RegistroPontosSetorController::class);
Route::get('/load', [RegistroPontosSetorController::class, 'loadRegistros'])->name('info.load');
Route::get('/download_pontos', [PontosController::class, 'downloadTabelaPontos'])->name('download.pontos');

