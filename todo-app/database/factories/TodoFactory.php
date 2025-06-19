<?php

namespace Database\Factories;

use App\Enums\TodoPriorityEnum;
use App\Enums\TodoStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(3),
            'user_id' => fake()->randomNumber(1, 30),
            'category_id' => fake()->randomNumber(1, 3),
            'status' => fake()->randomElement(TodoStatusEnum::cases()),
            'priority' => fake()->randomElement(TodoPriorityEnum::cases()),
            'due_date' => fake()->dateTimeBetween('-1 week', '+1 week'),
            'completed_date' => fake()->dateTimeBetween('-1 week', '+1 week'),
            'is_starred' => fake()->boolean(10)
        ];
    }
}
