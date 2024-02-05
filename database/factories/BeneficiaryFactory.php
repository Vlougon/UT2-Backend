<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Beneficiary;

class BeneficiaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beneficiary::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'gender' => $this->faker->randomElement(["Male","Female","Other"]),
            'marital_status' => $this->faker->randomElement(["Single","Engaged","Married","Divorced","Uncoupled","Widower"]),
            'beneficiary_type' => $this->faker->randomElement(["Above65","65-45","44-30","29-19","18-12","Below12"]),
            'social_security_number' => $this->faker->word(),
            'rutine' => $this->faker->text(),
            'first_surname' => $this->faker->word(),
            'second_surname' => $this->faker->word(),
            'birth_date' => $this->faker->date(),
        ];
    }
}
