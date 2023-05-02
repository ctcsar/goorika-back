<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'userId'=> fake()->randomElement(User::all('id')),
        'body'=> Str::random(50),
        'description'=> fake()->realText(),
        'title'=> Str::random(20),
        'tags'=> Str::random(50),
        'position'=> fake()->unique()->randomNumber(),
        'active'=> fake()->randomElement([1,0]),
        'price'=> fake()->randomDigitNotNull(),
        'discount'=> fake()->randomDigitNotNull(),
        'eventId'=> fake()->randomDigitNotNull()

        ];
    }
}
