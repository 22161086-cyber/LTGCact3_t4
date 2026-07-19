<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear categorías de prueba
        $categorias = ['Electrónica', 'Ropa', 'Hogar', 'Alimentos'];
        foreach ($categorias as $cat) {
            \App\Models\Categoria::create(['nombre' => $cat]);
        }

       // Crear 20 productos aleatorios vinculados a esas categorías
    \App\Models\Producto::factory(20)->create();
}
}