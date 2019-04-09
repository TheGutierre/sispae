<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('cadastro/empresas', function () {
	return view('empresas.create');
});

Route::get('test', function () {
	return \Illuminate\Support\Facades\Auth::user()->responsaveis()->first()->empresas_id;
});

Route::post('cadastro/empresas', 'EmpresaController@create')->name('empresas.create')->middleware('auth');

Route::get('/egressos', ['as' => 'egressos.index', 'uses' => 'EgressosController@index']);

Route::group(['as' => 'graficos.','prefix' => 'graficos','middleware' => 'auth'], function() {
	Route::get('porcurso', ['as' => 'porcurso', 'uses' => 'GraficosController@index']);
	Route::get('porregiao', ['as' => 'porregiao', 'uses' => 'GraficosController@porregiao']);
});

Route::group(['as' => 'social.','prefix' => 'social'], function() {
	Route::get('facebook/login', ['as' => 'facebook.login', 'uses' => 'FacebookController@redirect']);
	Route::get('facebook/callback', ['as' => 'facebook.callback', 'uses' => 'FacebookController@callback']);
});

// Route::resource('empresas',['uses' => 'EmpresaController@resource']);

/* VAGAS*/
Route::group(['as' => 'vagas.','prefix' => 'vagas'], function() {
	Route::get('cadastrar', ['as' => 'cadastrar', 'uses' => 'VagasController@cadastrar', 'middleware' => 'auth']);
	Route::post('cadastrar', ['as' => 'cadastrar', 'uses' => 'VagasController@cadastrar', 'middleware' => 'auth']);
	Route::get('index', ['as' => 'index', 'uses' => 'VagasController@index', 'middleware' => 'auth']);
	Route::get('editar.{id}', ['as' => 'cadastrar', 'uses' => 'VagasController@edit', 'middleware' => 'auth']);
	Route::post('editar', ['as' => 'cadastrar', 'uses' => 'VagasController@cadastrar', 'middleware' => 'auth']);
});

Route::post('enviarMensagem', ['as' => 'contato.enviar', 'uses' => 'HomeController@enviarMensagem']);

// Social Login
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');