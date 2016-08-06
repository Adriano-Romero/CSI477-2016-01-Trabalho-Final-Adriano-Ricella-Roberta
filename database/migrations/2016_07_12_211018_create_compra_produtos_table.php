<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompraProdutosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('compra_produto', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('compra_id');
			$table->integer('produto_id');
			$table->integer('quantidade');
			$table->decimal('preco', 10, 2);
			$table->decimal('total', 10, 2);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('compra_produto');
	}
}
