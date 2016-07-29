<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model {
	protected $fillable = array('cliente_id', 'produto_id', 'quantidade', 'total');

	public function produtoCarrinho() {
		return $this->hasMany('App\Produto', 'produto_id');
	}

	public function userCarrinho() {
		return $this->hasMany('App\User', 'user_id');
	}

}
