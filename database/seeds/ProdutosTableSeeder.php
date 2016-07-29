<?php

use Illuminate\Database\Seeder;

class ProdutosTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('produtos')->insert([
			'produto_nome' => 'Xbox One - Turtle Beach X-40 Headset',
			'preco' => 29.89,
			'foto' => 'patas.jpg',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);

		DB::table('produtos')->insert([
			'produto_nome' => 'Xbox One - Elite Controller',
			'preco' => 150.00,
			'foto' => 'agua.jpg',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);

		DB::table('produtos')->insert([
			'produto_nome' => 'Means Levi Jeans - Dark Blue',
			'preco' => 59.89,
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
	}
}
