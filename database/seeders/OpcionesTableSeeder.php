<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class OpcionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('opciones')->insert([
            'valor' => 'Vista 1 narciso',
            'clave' => '1',
        ]);

        DB::table('opciones')->insert([
            'valor' => 'Vista 1 clara',
            'clave' => '0',
        ]);

        DB::table('opciones')->insert([
            'valor' => 'footer 1 narciso',
            'clave' => '2',
        ]);


    }
}
