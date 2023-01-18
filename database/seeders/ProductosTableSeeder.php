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
            'name' => 'Estación del Ferro-Carril',
            'image' => '',
            'categoria_id' => '2',
        ]);
        DB::table('productos')->insert([
            'name' => 'Entrada Real de la Feria',
            'image' => '',
            'categoria_id' => '2',
        ]);
        DB::table('productos')->insert([
            'name' => 'Plaza de Toros',
            'image' => '',
            'categoria_id' => '2',
        ]);
        DB::table('productos')->insert([
            'name' => 'Calle Real',
            'image' => '',
            'categoria_id' => '2',
        ]);
        DB::table('productos')->insert([
            'name' => 'Cuevas del Puerto',
            'image' => '',
            'categoria_id' => '2',
        ]);
        DB::table('productos')->insert([
            'name' => 'Vista Panorámica Almería',
            'image' => '',
            'categoria_id' => '2',
        ]);
        DB::table('productos')->insert([
            'name' => 'Puerto de Almería',
            'image' => '',
            'categoria_id' => '2',
        ]);
        DB::table('productos')->insert([
            'name' => 'Torre de vela',
            'image' => '',
            'categoria_id' => '2',
        ]);
        DB::table('productos')->insert([
            'name' => 'Catedral, Fachada de los Perdones',
            'image' => '',
            'categoria_id' => '2',
        ]);
    }
}