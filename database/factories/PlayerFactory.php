<?php

namespace Database\Factories;

use App\Models\Club;
use App\Models\Country;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
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
            "position_id" => fake()->randomElement(Position::all()),
            "number" => fake()->numberBetween(1, 100),
            "club_id" => fake()->randomElement(Club::all()),
            "country_id" => fake()->randomElement(Country::all())
        ];
    }
}
