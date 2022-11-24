<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'name' => 'José Manuel',
            'user' => 'joselito',
            'password' => 'asdf',
        ]);

        DB::table('usuarios')->insert([
            'name' => 'Lucía',
            'user' => 'lcp622',
            'password' => 'root',
        ]);

        DB::table('usuarios')->insert([
            'name' => 'Juan',
            'user' => 'juan',
            'password' => 'juan',
        ]);
    }
}
