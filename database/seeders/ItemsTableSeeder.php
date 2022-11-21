<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'name' => 'Autor',
        ]);

        DB::table('items')->insert([
            'name' => 'fecha emision',
        ]);

        DB::table('items')->insert([
            'name' => 'observaciones',
        ]);

        DB::table('items')->insert([
            'name' => 'soporte original',
        ]);

    }
}