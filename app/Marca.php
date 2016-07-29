<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model {

	/**
	 * Atributos mass assignable.
	 * @var array
	 */
	protected $fillable = [
		'nome_marca',
	];

	/**
	 * Relaçaão 1:N de marca para produtos.
	 * @return $this
	 */
	public function produtoMarca() {
		return $this->hasMany('App\Produto', 'marca_id');
	}

}
