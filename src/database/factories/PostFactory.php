<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = \App\Models\Post::class;

    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence,
            'resumo' => $this->faker->paragraph,
            'conteudo' => $this->faker->text(500),
            'imagem' => $this->faker->imageUrl(640, 480, 'food', true, 'Faker'), // URL de uma imagem fake
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
