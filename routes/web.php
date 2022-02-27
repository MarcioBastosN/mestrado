<?php

use App\Http\Controllers\PontosController;
use App\Http\Controllers\RelacaoPontosController;
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

Route::resource('pontos', PontosController::class);
Route::post('pontos/editar', [PontosController::class, "alterar_todos"])->name("pontos.alterar");
Route::resource('relacoes_pontos', RelacaoPontosController::class);
