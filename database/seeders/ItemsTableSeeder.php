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

        ////////////////////////////////////////////////////////
                        //PIEZAS ARQUEOLÓGICAS
        ////////////////////////////////////////////////////////

        DB::table('items')->insert([
            'name' => 'Número',
            'categoria_id' => '1',
        ]);

        DB::table('items')->insert([
            'name' => 'Función',
            'categoria_id' => '1',
        ]);

        DB::table('items')->insert([
            'name' => 'Dimensiones',
            'categoria_id' => '1',
        ]);

        DB::table('items')->insert([
            'name' => 'Características Técnicas',
            'categoria_id' => '1',
        ]);

        DB::table('items')->insert([
            'name' => 'Morfología',
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
            'name' => 'Depósito',
            'categoria_id' => '1',
        ]);
        
        DB::table('items')->insert([
            'name' => 'Bibliografía',
            'categoria_id' => '1',
        ]);  




        ////////////////////////////////////////////////////////
                            //POSTALES
        ////////////////////////////////////////////////////////




        DB::table('items')->insert([
            'name' => 'Observaciones',
            'categoria_id' => '2',
        ]);

        DB::table('items')->insert([
            'name' => 'Dimensiones',
            'categoria_id' => '2',
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