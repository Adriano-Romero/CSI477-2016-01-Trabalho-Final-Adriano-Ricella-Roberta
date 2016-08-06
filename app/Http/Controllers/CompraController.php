<?php

namespace App\Http\Controllers;
use App\Carrinho;
use App\Compra;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;

class CompraController extends Controller {
	public function index() {
		if (Auth::guest()) {
			return redirect('/produtos')
				->with('error', 'Acesso negado');

		}
		$user_id = Auth::user()->id;
		if (!Auth::user()->admin) {

			$compras = Compra::all();

		} else {

			$compras = Compra::with('compraProdutos')->where('user_id', '=', $user_id)->get();
		}

		if (!$compras) {

			return Redirect::route('index')->with('error', 'Não há compras.');
		}

		return view('compras.index')
			->with('compras', $compras);
	}

	public function postCompra() {
		$rules = array(

			'endereco' => 'required',
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::route('carrinho')->with('error', 'Endereço é obrigatório!');
		}

		$user_id = Auth::user()->id;
		$endereco = Input::get('endereco');

		$carrinho_produtos = Carrinho::with('produtos')->where('user_id', '=', $user_id)->get();

		$carrinho_total = Carrinho::with('produtos')->where('user_id', '=', $user_id)->sum('total');

		if (!$carrinho_produtos) {
			return redirect()->back()
				->with('error', 'Carrinho vazio');
		}

		$compra = Compra::create(
			array(
				'user_id' => $user_id,
				'endereco' => $endereco,
				'total' => $carrinho_total,
			));

		foreach ($carrinho_produtos as $compra_produtos) {

			$compra->compraProdutos()->attach($compra_produtos->produto_id, array(
				'quantidade' => $compra_produtos->quantidade,
				'preco' => $compra_produtos->produtos->preco,
				'total' => $compra_produtos->produtos->preco * $compra_produtos->quantidade,
			));
			\DB::table('produtos')->decrement('quantidade', $compra_produtos->quantidade);
		}

		//\DB::table('produtos')->decrement('quantidade', $compra_produtos->quantidade);

		Carrinho::where('user_id', '=', $user_id)->delete();

		return Redirect::action('CompraController@index')->with('message', 'Compra concluída com sucesso.');
	}
}
