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
            'value' => 'arcilla',
        ]);

        DB::table('items_productos')->insert([
            'productos_id' => '1',
            'items_id' => '2',
            'value' => 'estampilla',
        ]);

        DB::table('items_productos')->insert([
            'productos_id' => '1',
            'items_id' => '3',
            'value' => 'Almería',
        ]);

        DB::table('items_productos')->insert([
            'productos_id' => '1',
            'items_id' => '4',
            'value' => '1895',
        ]);

        DB::table('items_productos')->insert([
            'productos_id' => '1',
            'items_id' => '5',
            'value' => 'bibliografia',
        ]);

        DB::table('items_productos')->insert([
            'productos_id' => '1',
            'items_id' => '6',
            'value' => 'observación',
        ]);
        
        DB::table('items_productos')->insert([
            'productos_id' => '2',
            'items_id' => '7',
            'value' => 'madera',
        ]);
        DB::table('items_productos')->insert([
            'productos_id' => '2',
            'items_id' => '8',
            'value' => 'Postal del Paseo de almería',
        ]);
        DB::table('items_productos')->insert([
            'productos_id' => '2',
            'items_id' => '9',
            'value' => 'autor',
        ]);
        DB::table('items_productos')->insert([
            'productos_id' => '2',
            'items_id' => '10',
            'value' => 'colección',
        ]);
        DB::table('items_productos')->insert([
            'productos_id' => '2',
            'items_id' => '11',
            'value' => '1876',
        ]);
        DB::table('items_productos')->insert([
            'productos_id' => '2',
            'items_id' => '12',
            'value' => 'impresor',
        ]);

    }
}
