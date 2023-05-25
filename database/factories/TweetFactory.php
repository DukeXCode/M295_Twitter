<?php

namespace Database\Factories;

use App\Models\Tweet;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Tweet>
 */
class TweetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            'text' => $this->faker->text(random_int(5, 160)),
            'likes' => $this->faker->numberBetween(0, 20000),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now')->format('Y-m-d H:i:s')
        ];
    }
}
