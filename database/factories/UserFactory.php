<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => Str::limit($this->faker->name(), 70),
            'password' => $this->faker->password(),
            'role' => $this->faker->randomElement(["supervisor", "assistant"]),
            'email' => $this->faker->safeEmail(),
        ];
    }
}
