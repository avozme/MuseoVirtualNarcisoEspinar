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
            'nombre' => 'Vasija marroquí',
            'descripcion' => 'Una vasija',
            'dimensiones' => '58cmx36cm',
            'coleccion' => 'vasijas',
            'tecnica' => 'semi-vidriada',
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Postal paseo',
            'descripcion' => 'Una postal del paseo de almerí',
            'dimensiones' => '10cmx15cm',
            'coleccion' => 'postales',
            'tecnica' => 'a color',
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Postal rambla',
            'descripcion' => 'Una postal de la rambla',
            'dimensiones' => '10cmx15cm',
            'coleccion' => 'postales',
            'tecnica' => 'sepia',
        ]);
        DB::table('productos')->insert([
            'nombre' => 'Vasija marroquí',
            'descripcion' => 'otra vasija',
            'dimensiones' => '58cmx36cm',
            'coleccion' => 'vasijas',
            'tecnica' => 'arcilla',
        ]);
        DB::table('productos')->insert([
            'nombre' => 'postal pescaderia',
            'descripcion' => 'una postal de pescaderia',
            'dimensiones' => '10cmx15cm',
            'coleccion' => 'postales',
            'tecnica' => 'a color',
        ]);
        
    }
}