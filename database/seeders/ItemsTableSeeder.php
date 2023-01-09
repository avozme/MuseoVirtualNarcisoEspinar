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
            'name' => 'Material',
            'categoria_id' => '1',
        ]);

        DB::table('items')->insert([
            'name' => 'Técnica',
            'categoria_id' => '1',
        ]);

        DB::table('items')->insert([
            'name' => 'Procedencia',
            'categoria_id' => '1',
        ]);

        DB::table('items')->insert([
            'name' => 'Cronología',
            'categoria_id' => '1',
        ]);

        DB::table('items')->insert([
            'name' => 'Bibliografía',
            'categoria_id' => '1',
        ]);

        DB::table('items')->insert([
            'name' => 'Soporte original',
            'categoria_id' => '2',
        ]);

        DB::table('items')->insert([
            'name' => 'Descripción',
            'categoria_id' => '2',
        ]);

        DB::table('items')->insert([
            'name' => 'Autor',
            'categoria_id' => '2',
        ]);

        DB::table('items')->insert([
            'name' => 'Colección',
            'categoria_id' => '2',
        ]);

        DB::table('items')->insert([
            'name' => 'Fecha Emisión',
            'categoria_id' => '2',
        ]);

        DB::table('items')->insert([
            'name' => 'Impresor',
            'categoria_id' => '2',
        ]);    
    }
}