<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Album;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faixa>
 */
class FaixaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'duracao' => fake()->numerify('##:##'), //numerify() substitui os caracteres especiais # por dígitos numéricos aleatórios.
            'album_id' => function () {
                return Album::inRandomOrder()->first()->id; //A Função inRandomOrder() está selecionando todos os registros da tabela de álbuns, mas em uma ordem aleatória
            },
        ];
    }
}
