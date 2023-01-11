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
            'remarks' => 'Buen Estado',
            'dimensions' => '58cm x 36cm',
            'image' => '',
            'image2' => '',
            'categoria_id' => '1',
        ]);
        DB::table('productos')->insert([
            'name' => 'Postal Paseo',
            'remarks' => 'Deplorable',
            'dimensions' => '15cm x 10cm',
            'image' => '',
            'image2' => '',
            'categoria_id' => '2',
        ]);
    }
}