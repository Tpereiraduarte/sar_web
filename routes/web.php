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

    Route::get('inicio','InicioController@index')->name('inicio');
    
    });




Route::resource('pergunta','PerguntasController');
Route::resource('perfil','PerfilsController');
Route::resource('usuario', 'UsersController');
Route::resource('norma', 'NormasController');

});