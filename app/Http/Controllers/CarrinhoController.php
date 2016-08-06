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
			'quantidade' => 'required|numeric|min:1',
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

	public function update() {

		// Set $user_id to the currently signed in user ID
		$user_id = Auth::user()->id;

		// Set the $quantidade to the quantity of produtos selected
		$quantidade = Input::get('quantidade');

		// Set $product_id to the hidden product input field in the update carrinho from
		$produto_id = Input::get('produto');

		// Set $carrinho_id to the hidden carrinho_id input field in the update carrinho from
		$carrinho_id = Input::get('carrinho_id');

		// Find the ID of the produtos in the Cart
		$produto = Produto::find($produto_id);

		$total = $quantidade * $produto->preco;

		// Select ALL from carrinho where the user ID = to the current logged in user, produto_id = the current produto ID being updated, and the carrinho_id = to the carrinhoId being updated
		$carrinho = Carrinho::where('user_id', '=', $user_id)->where('produto_id', '=', $produto_id)->where('id', '=', $carrinho_id);

		// Update your carrinho
		$carrinho->update(array(
			'user_id' => $user_id,
			'produto_id' => $produto_id,
			'quantidade' => $quantidade,
			'total' => $total,
		));

		return redirect()->route('carrinho');
	}

	public function getDelete($id) {

		$carrinho = Carrinho::find($id)->delete();

		return Redirect::route('carrinho');
	}

	public function delete($id) {
		// Find the Carts table and given ID, and delete the record
		Carrinho::find($id)->delete();

		// Then redirect back
		return redirect()->back();
	}

}
