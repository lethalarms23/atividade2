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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/livros','App\Http\Controllers\LivrosController@index')->name('livros.index');

Route::get('/generos','App\Http\Controllers\GeneroController@index')->name('generos.index');

Route::get('/editoras','App\Http\Controllers\EditorasController@index')->name('editoras.index');