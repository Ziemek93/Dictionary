<?php

namespace Database\Factories;

use App\Models\Definition;
use App\Models\Word;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
          return [
            'name' => $this->faker->word(),
            'definition_id' => Definition::factory(),
        ];

    }


}
