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
        DB::table('users')->insert([
            'name' => 'José Manuel',
            'user' => 'joselito',
            'password' => 'asdf',
        ]);

        DB::table('users')->insert([
            'name' => 'Juan',
            'user' => 'juan',
            'password' => 'juan',
        ]);
    }
}
