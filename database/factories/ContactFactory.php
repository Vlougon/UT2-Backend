<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Contact;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'first_surname' => $this->faker->word(),
            'second_surname' => $this->faker->word(),
            'contact_type' => $this->faker->randomElement(["Familiar","Friend","Partner","Other"]),
        ];
    }
}
