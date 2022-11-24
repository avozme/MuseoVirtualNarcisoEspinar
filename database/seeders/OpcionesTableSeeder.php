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
            'value' => 'Vista 1 narciso',
            'key' => '1',
        ]);

        DB::table('opciones')->insert([
            'value' => 'Vista 1 clara',
            'key' => '0',
        ]);

        DB::table('opciones')->insert([
            'value' => 'footer 1 narciso',
            'key' => '2',
        ]);


    }
}
