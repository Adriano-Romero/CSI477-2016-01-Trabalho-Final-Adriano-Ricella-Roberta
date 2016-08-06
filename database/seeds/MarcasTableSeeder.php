<?php

use Illuminate\Database\Seeder;

class MarcasTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('marcas')->insert([
			'nome' => 'Village Nutrition',
		]);

		DB::table('marcas')->insert([
			'nome' => 'Natural Motion',
		]);

		DB::table('marcas')->insert([
			'nome' => 'CarobHouses',
		]);

		DB::table('marcas')->insert([
			'nome' => 'Hearts nature',
		]);

		DB::table('marcas')->insert([
			'nome' => 'Jasmine',
		]);
		DB::table('marcas')->insert([
			'nome' => 'Novo Citrus',
		]);
	}
}
