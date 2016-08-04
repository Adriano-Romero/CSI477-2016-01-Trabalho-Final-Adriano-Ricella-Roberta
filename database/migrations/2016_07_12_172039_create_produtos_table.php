<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProdutosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('produtos', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nome');
			$table->integer('quantidade');
			$table->decimal('preco', 10, 2)->unsigned();
			$table->text('descricao');
			$table->integer('marca_id')->unsigned();
			//$table->foreign('marca_id')->references('id')->on('marcas');
			$table->integer('categoria_id')->unsigned();
			// $table->foreign('categoria_id')->references('id')->on('categorias');
			$table->text('foto');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('produtos');
	}
}
