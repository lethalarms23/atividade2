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

//Pagina Inicial Slick

Route::get('/index',function(){ return view('index');})->name('home.index');

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



Route::get('/generos/create','App\Http\Controllers\GeneroController@create')->name('generos.create');

Route::post('/generos/store','App\Http\Controllers\GeneroController@store')->name('generos.store');



Route::get('/editoras/create','App\Http\Controllers\EditorasController@create')->name('editoras.create');

Route::post('/editoras/store','App\Http\Controllers\EditorasController@store')->name('editoras.store');



Route::get('/autores/create','App\Http\Controllers\AutorController@create')->name('autores.create');

Route::post('/autores/store','App\Http\Controllers\AutorController@store')->name('autores.store');


//Editar valores da BD

Route::get('/livros/{id}/edit','App\Http\Controllers\LivrosController@edit')->name('livros.edit');

Route::patch('/livro/{id}/update','App\Http\Controllers\LivrosController@update')->name('livros.update');


Route::get('/generos/{id}/edit','App\Http\Controllers\GeneroController@edit')->name('genero.edit');

Route::patch('/generos/{id}/update','App\Http\Controllers\GeneroController@update')->name('genero.update');


Route::get('/editoras/{id}/edit','App\Http\Controllers\EditorasController@edit')->name('editora.edit');

Route::patch('/editoras/{id}/update','App\Http\Controllers\EditorasController@update')->name('editora.update');


Route::get('/autores/{id}/edit','App\Http\Controllers\AutorController@edit')->name('autor.edit');

Route::patch('/autores/{id}/update','App\Http\Controllers\AutorController@update')->name('autor.update');


//Remover valores da BD
Route::get('/livros/{id}/delete','App\Http\Controllers\LivrosController@delete')->name('livros.delete');

Route::delete('/livros/{id}/destroy','App\Http\Controllers\LivrosController@destroy')->name('livros.destroy');


Route::get('/generos/{id}/delete','App\Http\Controllers\GeneroController@delete')->name('genero.delete');

Route::delete('/generos/{id}/destroy','App\Http\Controllers\GeneroController@destroy')->name('genero.destroy');


Route::get('/editoras/{id}/delete','App\Http\Controllers\EditorasController@delete')->name('editora.delete');

Route::delete('/editoras/{id}/destroy','App\Http\Controllers\EditorasController@destroy')->name('editora.destroy');


Route::get('/autores/{id}/delete','App\Http\Controllers\AutorController@delete')->name('autor.delete');

Route::delete('/autores/{id}/destroy','App\Http\Controllers\AutorController@destroy')->name('autor.destroy');