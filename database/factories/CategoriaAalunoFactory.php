<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoriaAaluno>
 */
class CategoriaAalunoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome'=>$this->faker->unique()->randomElement([
               'FUNDAMERNTAL',
               'MÉDIO',
               'GRADUAÇÃO',
               'PÓS - GRADUAÇÃO',
            ]),
            'nivel' =>$this->faker->numberBetween()
        ];
    }
}
