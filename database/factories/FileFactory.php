<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'original_name' => $this->faker->word(),
            'extension' => $this->faker->fileExtension(),
            'image' => $this->faker->imageUrl(),
            'size' => rand(1, 5),
        ];
    }
}
