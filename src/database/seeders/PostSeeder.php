<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Post::create([
                'titulo' => $faker->sentence(6, true),
                'resumo' => $faker->paragraphs(1, true),
                'conteudo' => $faker->paragraphs(10, true),
                'imagem' => "https://placekitten.com/500/500", //meow              
                'created_at' => $faker->dateTimeBetween('2020-01-01','2024-12-31'),
                'updated_at' => now(),
            ]);
        }
    }
}
