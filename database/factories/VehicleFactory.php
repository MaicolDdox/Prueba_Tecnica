<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'plate' => fake()->regexify('[A-Za-z0-9]{20}'),
            'color' => fake()->regexify('[A-Za-z0-9]{30}'),
            'brand' => fake()->regexify('[A-Za-z0-9]{50}'),
            'vehicle_type' => fake()->randomElement(["particular","publico"]),
            'owner_id' => Person::factory()->state(['type' => Person::TYPE_OWNER]),
            'driver_id' => Person::factory()->state(['type' => Person::TYPE_DRIVER]),
        ];
    }
}
