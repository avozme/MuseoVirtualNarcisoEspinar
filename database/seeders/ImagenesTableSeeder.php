<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ImagenesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('imagenes')->insert([
            'image' => 'Imagen 1',
        ]);

        DB::table('imagenes')->insert([
            'image' => 'Imagen 2',
        ]);

        DB::table('imagenes')->insert([
            'image' => 'Imagen 3',
        ]);
    }
}
