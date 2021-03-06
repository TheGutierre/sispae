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
})->middleware('auth');

Route::get('register/adm', function () {
	return view('auth.registerAdm');
});
Route::post('register/adm', 'Auth\RegisterController@createAdm')->name('auth.registerAdm');

Route::get('empresas/editar/{id}', 'EmpresaController@edit')->name('empresas.edit')->middleware('auth');

Route::post('empresas/editar/', 'EmpresaController@update')->name('empresas.edit')->middleware('auth');

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
Route::get('vagas/cadastrar', function () {
	return view('vagas.create');
});

Route::get('vagas/minha','VagasController@minhasVagas')->name('vagas.minhasVagas')->middleware('auth');

Route::get('vagas/candidatos/{id}','VagasController@candidatos')->name('vagas.candidatos')->middleware('auth');

Route::get('vagas/vaga/{id}','VagasController@vaga')->name('vagas.vaga')->middleware('auth');

Route::post('vagas/vaga/', 'VagasController@candidatar')->name('vagas.vaga')->middleware('auth');

Route::get('vagas/delete/{id}','VagasController@destroy')->name('vagas.index')->middleware('auth');

Route::get('vagas/editar/{id}', 'VagasController@edit')->name('vagas.edit')->middleware('auth');

Route::post('vagas/editar/', 'VagasController@update')->name('vagas.edit')->middleware('auth');

Route::group(['as' => 'vagas.','prefix' => 'vagas'], function() {
	//Route::get('cadastrar', ['as' => 'cadastrar', 'uses' => 'VagasController@cadastrar', 'middleware' => 'auth']);
	Route::post('cadastrar', ['as' => 'cadastrar', 'uses' => 'VagasController@cadastrar', 'middleware' => 'auth']);
	Route::get('index', ['as' => 'index', 'uses' => 'VagasController@index', 'middleware' => 'auth']);
	Route::post('index', ['as' => 'index', 'uses' => 'VagasController@verifica', 'middleware' => 'auth']);
	});

Route::post('enviarMensagem', ['as' => 'contato.enviar', 'uses' => 'HomeController@enviarMensagem']);

// Social Login
Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');