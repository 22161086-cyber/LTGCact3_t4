<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      return [
            'categoria_id' => \App\Models\Categoria::inRandomOrder()->first()->id ?? 1,
            'nombre' => $this->faker->randomElement(['Camisa', 'Pantalón', 'Tenis', 'Licuadora', 'Audífonos']),
           'descripcion' => 'Calidad premium con garantía oficial de la marca.',
            'precio' => $this->faker->randomFloat(2, 10, 1000),
            'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
    }

