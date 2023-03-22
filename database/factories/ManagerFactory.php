<?php

namespace Database\Factories;

use App\Models\Club;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Manager>
 */
class ManagerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->firstName('male'),
            "surname" => fake()->lastName(),
            "birth" => fake()->date(),
            "country_id" => fake()->randomElement(Country::all()),
            "club_id" => fake()->randomElement(Club::all())
        ];
    }
}
