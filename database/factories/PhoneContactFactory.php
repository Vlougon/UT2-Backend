<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Contact;
use App\Models\Phone_Contact;

class PhoneContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PhoneContact::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'contact_id' => Contact::factory(),
            'phone_number' => $this->faker->phoneNumber(),
        ];
    }
}
