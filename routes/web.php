<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;

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

Route::get('/', [UsuarioController::class, 'listagem'])->name('home');

// Route::get('/', 'UsuarioController@cadastrar');
Route::post('/', [UsuarioController::class, 'salvar'])->name('salvar');

// Rota teste materialize
Route::get('/listagem', [UsuarioController::class, 'listagem'])->name('listagem');

// Rota para formulário de cadastro
Route::get('/cadastrar', [UsuarioController::class, 'cadastrar'])->name('cadastrar');

// recuperar campos alteração
Route::get('/listarAlterar/{chave}', [UsuarioController::class, "listarAlterar"])->name('listarAlterar');

// Rota para deletar registro
Route::get('/deletar/{chave}', [UsuarioController::class, 'deletar'])->name('deletar');