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
    $this->call(ItemsTableSeeder::class);
=======
    $this->call(ImagenesTablaSeeder::class);
>>>>>>> 298c109c8939f2137f262771e0e0f66d3df0aceb
    
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
