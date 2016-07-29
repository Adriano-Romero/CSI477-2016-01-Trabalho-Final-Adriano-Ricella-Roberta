<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCarrinhosTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('carrinhos', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('produto_id');
			$table->integer('quantidade')->unsigned();
			$table->decimal('total', 10, 2)->unsigned();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('carrinhos');
	}
}
