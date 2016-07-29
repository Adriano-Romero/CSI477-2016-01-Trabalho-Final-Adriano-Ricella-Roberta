<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dica extends Model {
	//
	protected $table = 'dicas';
	protected $fillable = ['titulo',
		'descricao',
	];
}
