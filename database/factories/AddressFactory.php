<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Address;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'locality' => $this->faker->word(),
            'postal_code' => $this->faker->postcode(),
            'province' => $this->faker->word(),
            'number' => $this->faker->word(),
            'street' => $this->faker->streetName(),
        ];
    }
}
