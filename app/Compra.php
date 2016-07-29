<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model {
	protected $fillable = array('user_id', 'endereco', 'total');

	public function compraProdutos() {
		return $this->belongsToMany('App\Produto')->withPivot('quantidade', 'preco', 'total');
	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}
}
