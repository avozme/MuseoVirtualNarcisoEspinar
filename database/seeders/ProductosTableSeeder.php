<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productos')->insert([
            'name' => 'Vasija marroquí',
            'image' => '',
            'categoria_id' => '1',
        ]);
        DB::table('productos')->insert([
            'name' => 'Postal Paseo',
            'image' => '',
            'categoria_id' => '2',
        ]);
    }
}