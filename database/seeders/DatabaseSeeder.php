<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    $this->call(CategoriasTableSeeder::class);
    $this->call(ProductoTableSeeder::class);
    $this->call(EtiquetasTableSeeder::class);
<<<<<<< HEAD
=======
    $this->call(ItemsTableSeeder::class);
>>>>>>> 9618f5da609edc07961aea740e999ab2026a5d29
    $this->call(ImagenesTableSeeder::class);
    
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
