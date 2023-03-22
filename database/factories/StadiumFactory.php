<?php

namespace Database\Factories;

use App\Models\Club;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stadium>
 */
class StadiumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => fake()->words(3, true),
            "founding" => fake()->year(),
            "country_id" => fake()->randomElement(Country::all())
        ];
    }
}
