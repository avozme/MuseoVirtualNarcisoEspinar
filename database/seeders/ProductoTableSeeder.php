<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductoTableSeeder extends Seeder
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
        ]);
        DB::table('productos')->insert([
            'name' => 'Postal paseo',
            'description' => 'Una postal del paseo de almerí',
            'dimensions' => '10cmx15cm',
            'collection' => 'postales',
            'technique' => 'a color',
        ]);
        DB::table('productos')->insert([
            'name' => 'Postal rambla',
            'description' => 'Una postal de la rambla',
            'dimensions' => '10cmx15cm',
            'collection' => 'postales',
            'technique' => 'sepia',
        ]);
        DB::table('productos')->insert([
            'name' => 'Vasija marroquí',
            'description' => 'otra vasija',
            'dimensions' => '58cmx36cm',
            'collection' => 'vasijas',
            'technique' => 'arcilla',
        ]);
        DB::table('productos')->insert([
            'name' => 'postal pescaderia',
            'description' => 'una postal de pescaderia',
            'dimensions' => '10cmx15cm',
            'collection' => 'postales',
            'technique' => 'a color',
        ]);
        
    }
}