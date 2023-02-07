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
            'value' => 'postal.png',
            'key' => 'fotoPrincipal',
            'type' => 'foto'
        ]);

        DB::table('opciones')->insert([
            'value' => 'logo.png',
            'key' => 'logo',
            'type' => 'foto'
        ]);

    }
}
