<?php

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

//ROTA PRINCIPAL SELECIONAR O ARQUIVO A SER PROCESSADO
Route::get('/', 'Produto@index')->name('index');

//ROTA PARA PROCESSAR O ARQUIVO
Route::post('importar', 'Produto@importar')->name('importar');

//ROTA PARA LISTAR OS PRODUTOS
Route::get('listar', 'Produto@listar')->name('listar');