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
            'nombre' => $this->faker->word(),
            'descripcion' => 'Este es un excelente producto para la categoría seleccionada, cuenta con garantía oficial y alta durabilidad en el hogar.',
            'precio' => $this->faker->randomFloat(2, 10, 1000),
            'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
    }

