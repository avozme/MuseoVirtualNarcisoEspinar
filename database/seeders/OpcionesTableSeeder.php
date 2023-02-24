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
        
        DB::table('opciones')->insert([
            'value' => 'Un poco más cerca de Álmería',
            'key' => 'titulo',
            'type' => 'titulo'
        ]);

        DB::table('opciones')->insert([
            'value' => '#ADA191',
            'key' => 'color_nav',
            'type' => 'color'
        ]);


        DB::table('opciones')->insert([
            'value' => '#FFFFFF',
            'key' => 'color_titulo_subtitulo',
            'type' => 'color'
        ]);

        DB::table('opciones')->insert([
            'value' => '#000000',
            'key' => 'color_raton_encima_elementos_menu',
            'type' => 'color'
        ]);

        DB::table('opciones')->insert([
            'value' => '#FFFFFF',
            'key' => 'color_elementos_menu',
            'type' => 'color'
        ]);

        DB::table('opciones')->insert([
            'value' => '#ADA191',
            'key' => 'paginacion',
            'type' => 'color'
        ]);

        DB::table('opciones')->insert([
            'value' => 'CONOCE SU HISTORIA',
            'key' => 'subTitulo',
            'type' => 'subTitulo'
        ]);

    }
}
