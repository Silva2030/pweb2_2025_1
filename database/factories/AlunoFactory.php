<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Aluno;

class AlunoFactory extends Factory
{

    protected $model = Aluno::class;

    public function definition(): array
    {
        return [
            'nome'=> $this->faker->name,
            'cpf'=> $this->faker->numerify('###########'),
            'telefone'=> $this->faker->phoneNumber(),
        ];
    }
}
