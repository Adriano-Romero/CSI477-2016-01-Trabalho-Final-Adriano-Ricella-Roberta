<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model {
	protected $fillable = array('user_id', 'produto_id', 'quantidade', 'total');

	public function produtos() {
		return $this->belongsTo('App\Produto', 'produto_id');
	}

	public function user() {
		return $this->belongsTo('App\User', 'user_id');
	}

}
