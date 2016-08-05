<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

Route::get('/', function () {
	return view('welcome');
});

//Route::get('/produtos', 'ProdutosController@index');
//Route::get('produtos/{id}', 'ProdutosController@show');
Route::resource('produtos', 'ProdutosController');
Route::auth();

Route::get('/home', 'HomeController@index');

Route::resource('dicas', 'DicasController');

Route::get('/carrinho', array(
	'before' => 'auth.basic',
	'as' => 'carrinho',
	'uses' => 'CarrinhoController@index'));

Route::post('/carrinho/update', [
	'uses' => 'CartController@update',
]);

Route::post('/carrinho/add', array(
	'before' => 'auth.basic',
	'uses' => 'CarrinhoController@postAddToCart'));
Route::get('/carrinho/delete/{id}', array(
	'before' => 'auth.basic',
	'as' => 'delete_book_from_cart',
	'uses' => 'CarrinhoController@getDelete'));

Route::post('/compra', array('before' => 'auth.basic',
	'uses' => 'CompraController@postCompra'));
Route::get('/user/compras', array('before' => 'auth.basic',
	'uses' => 'CompraController@index'));

Route::get('compras', array('before' => 'auth.basic',
	'uses' => 'CompraController@index'));