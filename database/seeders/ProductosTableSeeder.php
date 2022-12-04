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
            'description' => 'Una vasija',
            'dimensions' => '58cmx36cm',
            'collection' => 'vasijas',
            'technique' => 'semi-vidriada',
            'image' => 'imagen 1',
            'categoria_id' => '1',
        ]);
        DB::table('productos')->insert([
            'name' => 'Postal paseo',
            'description' => 'Una postal del paseo de almerí',
            'dimensions' => '10cmx15cm',
            'collection' => 'postales',
            'technique' => 'a color',
            'image' => 'imagen 2',
            'categoria_id' => '1',
        ]);
        DB::table('productos')->insert([
            'name' => 'Postal rambla',
            'description' => 'Una postal de la rambla',
            'dimensions' => '10cmx15cm',
            'collection' => 'postales',
            'technique' => 'sepia',
            'image' => 'imagen 3',
            'categoria_id' => '2',
        ]);
        DB::table('productos')->insert([
            'name' => 'Vasija marroquí',
            'description' => 'otra vasija',
            'dimensions' => '58cmx36cm',
            'collection' => 'vasijas',
            'technique' => 'arcilla',
            'image' => 'imagen 4',
            'categoria_id' => '1',
        ]);
        DB::table('productos')->insert([
            'name' => 'postal pescaderia',
            'description' => 'una postal de pescaderia',
            'dimensions' => '10cmx15cm',
            'collection' => 'postales',
            'technique' => 'a color',
            'image' => 'imagen 5',
            'categoria_id' => '1',
        ]);
        
    }
}