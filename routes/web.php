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
Route::post('/login','LoginController@login');
Route::get('/','LoginController@index')->name('login');
Route::group(['middleware'=>['auth']],function(){
    Route::get('/logout',function(){
        Auth::logout();
        return redirect()->action('LoginController@index');            
    });
    Route::get('inicio','InicioController@index')->name('inicio');
    Route::get('iniciomobile','InicioController@index')->name('iniciomobile');
    Route::post('pergunta/dinamico', 'PerguntasController@dinamico')->name('dinamico');
    Route::post('pergunta/paragrafodinamico', 'PerguntasController@paragrafodinamico')->name('paragrafodinamico');
    Route::resource('pergunta','PerguntasController');
    Route::resource('perfil','PerfilsController');
    Route::resource('usuario', 'UsersController');
    Route::resource('norma', 'NormasController');
    Route::resource('paragrafo', 'ParagrafosController');
    Route::resource('subparagrafo', 'SubParagrafosController');    
    Route::resource('usuarioperfil', 'UsuarioPerfilController');
    Route::resource('formulario', 'FormulariosController');
    Route::resource('permissao', 'PermissaoController');
    Route::resource('perfilpermissao', 'PerfilPermissaoController');
    Route::post('resposta/servico', 'RespostaFormulariosController@servico')->name('servico');
    Route::get('resposta/tiposervico', 'RespostaFormulariosController@tiposervico')->name('resposta.tiposervico');
    Route::resource('resposta', 'RespostaFormulariosController');
    Route::resource('ordemservico', 'OrdemServicosController');
});

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    