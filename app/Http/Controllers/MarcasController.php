<?php

namespace App\Http\Controllers;

use App\Marca;
use Auth;
use Illuminate\Http\Request;
use Session;

class MarcasController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		if (Auth::guest() or !Auth::user()->admin) {
			return redirect('/produtos')
				->with('error', 'Acesso negado');

		}
		$marcas = Marca::all();
		return view('marcas.index', ['marcas' => $marcas]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		if (Auth::guest() or !Auth::user()->admin) {
			return redirect('/produtos')
				->with('error', 'Acesso negado');
		}
		return view('marcas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'nome' => 'required',
		]);

		$input = $request->all();
		Marca::create($input);

		Session::flash('flash_message', 'Marca criada com sucesso!');

		return redirect()->back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		if (Auth::guest() or !Auth::user()->admin) {
			return redirect('/produtos')
				->with('error', 'Acesso negado');

		}
		$marca = Marca::findOrFail($id);
		return view('marcas.show', compact('marca'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		if (Auth::guest() or !Auth::user()->admin) {
			return redirect('/produtos')
				->with('error', 'Acesso negado');

		}
		$marca = Marca::findOrFail($id);
		return view('marcas.edit', compact('marca'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$marca = Marca::findOrFail($id);

		$this->validate($request, [
			'nome' => 'required',
		]);

		$input = $request->all();

		$marca->fill($input)->save();

		Session::flash('flash_message', 'Marca aatualizada!');

		return redirect()->back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
