<?php

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

//Routes Show


Route::get('/livros/{id}/show','App\Http\Controllers\LivrosController@show')->name('livros.show');

Route::get('/generos/{id}/show','App\Http\Controllers\GeneroController@show')->name('genero.show');

Route::get('/editoras/{id}/show','App\Http\Controllers\EditorasController@show')->name('editoras.show');

Route::get('/autores/{id}/show','App\Http\Controllers\AutorController@show')->name('autores.show');

//Routes Index

Route::get('/livros','App\Http\Controllers\LivrosController@index')->name('livros.index');

Route::get('/generos','App\Http\Controllers\GeneroController@index')->name('generos.index');

Route::get('/editoras','App\Http\Controllers\EditorasController@index')->name('editoras.index');

Route::get('/autores','App\Http\Controllers\AutorController@index')->name('autores.index');

//Route Pesquisa

Route::get('/','App\Http\Controllers\PesquisaController@index')->name('pesquisa.index');

Route::post('/pesquisa/resultado', 'App\Http\Controllers\PesquisaController@process')->name('pesquisa.process');

//Route Adicionar Valores á BD

Route::get('/livros/create','App\Http\Controllers\LivrosController@create')->name('livros.create');

Route::post('/livros/store','App\Http\Controllers\LivrosController@store')->name('livros.store');
