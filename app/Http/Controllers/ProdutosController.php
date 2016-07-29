<?php

namespace App\Http\Controllers;

use App\Produto;

class ProdutosController extends Controller {
	public function index() {

		$search = \Request::get('search'); //<-- we use global request to get the param of URI
		$produtos = Produto::where('nome_produto', 'like', '%' . $search . '%')->orderBy('id', 'asc')->with('marca')->get();

		return view('produtos.index', ['produtos' => $produtos]);
	}

	public function show($id) {
		//
		$produto = Produto::findOrFail($id);
		return view('produtos.show', compact('produto'));
	}
}
