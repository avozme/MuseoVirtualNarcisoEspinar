<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'name' => 'Coleccion colectiva',
        ]);
        DB::table('categorias')->insert([
            'name' => 'Coleccion individual',

        ]);
        DB::table('categorias')->insert([
            'name' => 'Ceramica Arave',

        ]);
        DB::table('categorias')->insert([
            'name' => 'Postales',

        ]);
        DB::table('categorias')->insert([
            'name' => 'Basura para borrar',
        ]);
        DB::table('categorias')->insert([
            'name' => 'Feria',

        ]);
    }
}