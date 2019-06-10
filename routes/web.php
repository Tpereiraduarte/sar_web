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


Route::get('/','InicioController@index');
Route::post('pergunta/dinamico', 'PerguntasController@dinamico')->name('dinamico');
Route::resource('pergunta','PerguntasController');
Route::resource('perfil','PerfilsController');
Route::resource('usuario', 'UsersController');
Route::resource('norma', 'NormasController');
Route::resource('paragrafo', 'ParagrafosController');
