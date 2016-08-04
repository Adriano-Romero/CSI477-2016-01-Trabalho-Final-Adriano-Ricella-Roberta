<?php

namespace App\Http\Controllers;
use App\Carrinho;
use App\Produto;
use Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Redirect;

class CarrinhoController extends Controller {
	public function index() {

		$user_id = Auth::id();
		$carrinho_produtos = Carrinho::with('produtos')->where('user_id', '=', $user_id)->get();

		$carrinho_total = Carrinho::with('produtos')->where('user_id', '=',
			$user_id)->sum('total');
		if (!$carrinho_produtos) {

			return redirect()->back()
				->with('error', 'Carrinho vazio');
		}
		return view('carrinho.index', compact('carrinho_produtos', 'carrinho_total'));
	}

	public function postAddToCart() {
		$rules = array(
			'quantidade' => 'required|numeric',
			'produto' => 'required|numeric|exists:produtos,id',
		);

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return redirect()->back()
				->with('error', 'Impossível adicionar o produto ao carrinho');
		}

		$user_id = Auth::id();
		$produto_id = Input::get('produto');
		$quantidade = Input::get('quantidade');

		$produto = Produto::find($produto_id);
		$total = $quantidade * $produto->preco;

		$count = Carrinho::where('produto_id', '=', $produto_id)->where('user_id', '=', $user_id)->count();

		if ($count) {
			return redirect()->back()
				->with('error', 'O produto já está em seu carrinho.');
		}

		Carrinho::create(
			array(
				'user_id' => $user_id,
				'produto_id' => $produto_id,
				'quantidade' => $quantidade,
				'total' => $total,
			));

		return Redirect::route('carrinho');
	}

	public function getDelete($id) {

		$carrinho = Carrinho::find($id)->delete();

		return Redirect::route('carrinho');
	}

}
