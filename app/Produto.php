<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model {
	protected $fillable = [
		'nome',
		'preco',
		'quantidade',
		'marca_id',
		'categoria_id',
		'descricao',
		'foto',

	];

	public function marca() {
		return $this->belongsTo('App\Marca');
	}

	public function categoria() {
		return $this->belongsTo('App\Categoria');
	}
}
