<?php

namespace App\Http\Controllers;

use App\Dica;
use Auth;
use Illuminate\Http\Request;
use Session;

class DicasController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$dicas = Dica::all();
		return view('dicas.index', ['dicas' => $dicas]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		if (!Auth::user()->admin) {
			return redirect('/produtos')
				->with('error', 'Acesso negado');

		}
		return view('dicas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'titulo' => 'required',
			'descricao' => 'required',
		]);

		$input = $request->all();
		Dica::create($input);

		Session::flash('flash_message', 'Dica criada com sucesso!');

		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
		$dica = Dica::findOrFail($id);
		return view('dicas.show', compact('dica'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		if (!Auth::user()->admin) {
			return redirect('/produtos')
				->with('error', 'Acesso negado');

		}
		$dica = Dica::findOrFail($id);
		return view('dicas.edit', compact('dica'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$dica = Dica::findOrFail($id);

		$this->validate($request, [
			'titulo' => 'required',
			'descricao' => 'required',
		]);

		$input = $request->all();

		$dica->fill($input)->save();

		Session::flash('flash_message', 'dica successfully added!');

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$dica = Dica::findOrFail($id);

		$dica->delete();

		Session::flash('flash_message', 'dica successfully deleted!');

		return redirect()->route('dicas.index');
	}
}
