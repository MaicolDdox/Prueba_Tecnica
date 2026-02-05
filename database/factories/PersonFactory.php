<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'document_number' => fake()->unique()->numerify('##########'),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->optional()->firstName(),
            'last_name' => fake()->lastName(),
            'address' => fake()->optional()->streetAddress(),
            'phone' => fake()->optional()->phoneNumber(),
            'city' => fake()->optional()->city(),
            'type' => fake()->randomElement(["conductor","propietario"]),
        ];
    }
}
