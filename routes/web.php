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



Route::get('/','LoginController@index')->name('login');

Route::post('/login','LoginController@login');

Route::get('inicio','InicioController@index')->name('inicio');

Route::group(['middleware'=>['auth']],function(){

    Route::get('/logout',function(){
        Auth::logout();
        return redirect()->action(
            'LoginController@index');
            
        });
        Route::get('inicio','InicioController@index')->name('inicio');
        Route::get('/','InicioController@index');
        Route::post('pergunta/dinamico', 'PerguntasController@dinamico')->name('dinamico');
        Route::post('pergunta/paragrafodinamico', 'PerguntasController@paragrafodinamico')->name('paragrafodinamico');
    
        Route::resource('pergunta','PerguntasController');
        Route::resource('perfil','PerfilsController');
        Route::resource('usuario', 'UsersController');
        Route::resource('norma', 'NormasController');
        Route::resource('paragrafo', 'ParagrafosController');
        Route::resource('subparagrafo', 'SubParagrafosController');    
    });
    
    
    




