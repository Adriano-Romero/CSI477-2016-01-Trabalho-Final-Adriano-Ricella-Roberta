<?php

namespace App\Http\Controllers;

class CarrinhoController extends Controller {
	public function index() {
		$user_id = Auth::user()->id;
		$produtos_carrinho =

		$carrinho = Carrinho::all();
		return view('carriho.index', compact('carrinho'));
	}

}
