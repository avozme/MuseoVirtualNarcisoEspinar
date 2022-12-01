<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'Autor',
            'categoria_id' => '1',
        ]);

        DB::table('items')->insert([
            'name' => 'fecha emision',
            'categoria_id' => '2',
        ]);

        DB::table('items')->insert([
            'name' => 'observaciones',
            'categoria_id' => '2',
        ]);

        DB::table('items')->insert([
            'name' => 'soporte original',
            'categoria_id' => '1',
        ]);

    }
}