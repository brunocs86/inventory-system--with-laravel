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

Route::get('/', function () {
    if(Auth::guest())
    {
        return view('auth/login');
    }

    return view('home');
    //return '<h1>Primeira Lógica com Laravel</h1>';
});

Route::get('/outra', function(){  phpinfo(); });

Route::get('/laravel', function () {
    return view('laravel');
    //return '<h1>Primeira Lógica com Laravel</h1>';
});

Route::get('/produtos', 'ProdutoController@lista');

Route::get('/produtos/mostra/{id}', 'ProdutoController@mostra')->where('id', '[0-9]+');

Route::get('/produtos/novo', 'ProdutoController@novo');

Route::post('/produtos/adiciona', 'ProdutoController@adiciona');

Route::get('/produtos/json', 'ProdutoController@listaJson');

Route::get('/produtos/remove/{id}', 'ProdutoController@remove')->where('id', '[0-9]+');

Route::get('/produtos/formalt/{id}', 'ProdutoController@formalt')->where('id', '[0-9]+');

Route::post('/produtos/altera/{id}', 'ProdutoController@altera');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
