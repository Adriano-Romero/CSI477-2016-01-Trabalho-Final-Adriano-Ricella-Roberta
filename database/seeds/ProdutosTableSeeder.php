<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProdutosTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('produtos')->insert([
			'nome' => 'LA Óleo de Cártamo - 120 cápsulas',
			'preco' => 29.89,
			'marca_id' => 1,
			'quantidade' => 200,
			'descricao' => 'Óleo de cártamo e vila ervas acelera o metabolismo, potencializa o sistema imunológico e diminui as taxas de colesterol.',

			'foto' => 'pimages/detox/LAoleo.jpg',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);

		DB::table('produtos')->insert([
			'nome' => 'Detox summer + Betacaroteno',
			'preco' => 10.89,
			'marca_id' => 2,
			'quantidade' => 100,
			'descricao' => 'Elimina toxinas do organismo, auxiliando na limpeza dos sistema gastrointestinal e do sangue a nível renal.',

			'foto' => 'pimages/detox/summer_mockup 120 comprimidos - .png',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);

		DB::table('produtos')->insert([
			'nome' => 'Alfarroba em barra 45g',
			'preco' => 15.89,
			'marca_id' => 3,
			'quantidade' => 100,
			'descricao' => 'A Alfarroba em Barra, apesar de ter aparência e textura semelhantes ao chocolate, possui um sabor diferenciado. O sabor de alfarroba é único. Experimente e descubra! Como todos os demais.',

			'foto' => 'pimages/doces/Alfarroba em barra 45g.jpg',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
	}
}
