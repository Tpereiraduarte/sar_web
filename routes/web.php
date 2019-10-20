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
    Route::get('resposta/historico', 'RespostaFormulariosController@historico')->name('resposta.historico');
    Route::resource('resposta', 'RespostaFormulariosController');
    Route::get('resposta/relatoriomobile', 'RespostaFormulariosController@relatoriomobile')->name('resposta.relatoriomobile');
    Route::resource('ordemservico', 'OrdemServicosController');  
    
    
    
    
    
    //rotas relatórios

    Route::get('relatorios/relatorioperfils', 'PerfilsController@geraPDF')->name('relatorios.relatorioperfils');
    Route::get('relatorios/relatoriousuarios', 'UsersController@geraPDF')->name('relatorios.relatoriousuarios');
    Route::get('relatorios/relatoriousuarioperfil', 'UsuarioPerfilController@geraPDF')->name('relatorios.relatoriousuarioperfil');
    Route::get('relatorios/relatorioperguntas', 'PerguntasController@geraPDF')->name('relatorios.relatorioperguntas');
    Route::get('relatorios/relatorionormas', 'NormasController@geraPDF')->name('relatorios.relatorionormas');
    Route::get('relatorios/relatorioparagrafo', 'ParagrafosController@geraPDF')->name('relatorios.relatorioparagrafo');
    Route::get('relatorios/relatoriosubparagrafo', 'SubParagrafosController@geraPDF')->name('relatorios.relatoriosubparagrafo');
    Route::get('relatorios/relatoriopermissao', 'PermissaoController@geraPDF')->name('relatorios.relatoriopermissao');
    Route::get('relatorios/relatorioperfilpermissao', 'PerfilPermissaoController@geraPDF')->name('relatorios.relatorioperfilpermissao');
});

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    