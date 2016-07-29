<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Eloquent::unguard();

		$this->call(UsersTableSeeder::class);
		$this->command->info('Users table seeded!');
		$this->call('MarcasTableSeeder');
		$this->command->info('Tabela de marcas semeiada!');
		$this->call('ProdutosTableSeeder');
		$this->command->info('Tabela de produtos semeiada!');

		\Illuminate\Database\Eloquent\Model::reguard();
	}

}
