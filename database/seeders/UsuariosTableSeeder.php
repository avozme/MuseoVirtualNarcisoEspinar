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
            'name' => 'José',
            'email' => 'jose@gmail.com',
            'password' => 'jose',
        ]);

        DB::table('users')->insert([
            'name' => 'Juan',
            'email' => 'juan@gmail.com',
            'password' => 'juan',
        ]);
    }
}
