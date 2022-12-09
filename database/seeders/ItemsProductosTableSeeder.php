<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class ItemsProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items_productos')->insert([
            'productos_id' => '1',
            'items_id' => '1',
            'value' => 'pepito',
        ]);

        DB::table('items_productos')->insert([
            'productos_id' => '1',
            'items_id' => '2',
            'value' => '24-02-1989',
        ]);

        DB::table('items_productos')->insert([
            'productos_id' => '2',
            'items_id' => '1',
            'value' => 'joseluis',
        ]);
    }
}
