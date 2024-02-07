<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Beneficiary;
use App\Models\Reminder;
use App\Models\User;

class ReminderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reminder::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $beneficiary = Beneficiary::inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'beneficiary_id' => $beneficiary->id,
            'title' => $this->faker->sentence(4),
            'terminated' => $this->faker->randomElement(["Yes","No"]),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'observations' => $this->faker->text(),
            'start_time' => $this->faker->time(),
            'end_time' => $this->faker->time(),
        ];
    }
}
