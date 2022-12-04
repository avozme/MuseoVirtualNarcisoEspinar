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
            'image' => 'Gel de baño con avena - 750 ml',
            'producto_id' => '1',
        ]);
    }
}
