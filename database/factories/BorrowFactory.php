<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'load_date' => fake()->date(),
            'borrow_date' => fake()->date(),
            'book_id' => fake()->numberBetween(1, 10),
            'user_id' => fake()->numberBetween(1, 5),
        ];
    }
}
