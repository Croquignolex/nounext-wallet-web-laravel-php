<?php

use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'title' => 'FCFA',
            'details' => 'Monnaie Camerounaise',
            'symbol' => 'XFA',
            'activated' => true,
            'user_id' => 1,
            'deleted' => false
        ]);
    }
}
