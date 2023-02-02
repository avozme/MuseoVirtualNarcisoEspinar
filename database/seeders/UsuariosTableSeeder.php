<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
            'name' => 'Josema',
            'email' => 'josemanuel@farmacias.dev',
            'password' => Hash::make('vivaespaña'),
            'type' => 'SuperAdmin'
        ]);

        DB::table('users')->insert([
            'name' => 'Juan',
            'email' => 'juan.baronviciana@gmail.com',
            'password' => Hash::make('vivaespaña'),
            'type' => 'SuperAdmin'
        ]);
    }
}
