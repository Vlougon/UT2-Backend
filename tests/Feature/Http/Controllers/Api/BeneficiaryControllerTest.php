<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Beneficiary;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\BeneficiaryController
 */
final class BeneficiaryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_responds_with(): void
    {
        $beneficiaries = Beneficiary::factory()->count(3)->create();

        $response = $this->get(route('beneficiary.index'));

        $response->assertOk();
    }


    #[Test]
    public function create_responds_with(): void
    {
        $response = $this->get(route('beneficiary.create'));

        $response->assertOk();
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\BeneficiaryController::class,
            'store',
            \App\Http\Requests\Api\BeneficiaryControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_responds_with(): void
    {
        $name = $this->faker->name();
        $gender = $this->faker->randomElement(/** enum_attributes **/);
        $marital_status = $this->faker->randomElement(/** enum_attributes **/);
        $beneficiary_type = $this->faker->randomElement(/** enum_attributes **/);
        $social_security_number = $this->faker->word();
        $rutine = $this->faker->text();
        $second_surname = $this->faker->word();
        $birth_date = $this->faker->date();

        $response = $this->post(route('beneficiary.store'), [
            'name' => $name,
            'gender' => $gender,
            'marital_status' => $marital_status,
            'beneficiary_type' => $beneficiary_type,
            'social_security_number' => $social_security_number,
            'rutine' => $rutine,
            'second_surname' => $second_surname,
            'birth_date' => $birth_date,
        ]);

        $beneficiaries = Beneficiary::query()
            ->where('name', $name)
            ->where('gender', $gender)
            ->where('marital_status', $marital_status)
            ->where('beneficiary_type', $beneficiary_type)
            ->where('social_security_number', $social_security_number)
            ->where('rutine', $rutine)
            ->where('second_surname', $second_surname)
            ->where('birth_date', $birth_date)
            ->get();
        $this->assertCount(1, $beneficiaries);
        $beneficiary = $beneficiaries->first();

        $response->assertNoContent(201);
    }


    #[Test]
    public function show_responds_with(): void
    {
        $beneficiary = Beneficiary::factory()->create();

        $response = $this->get(route('beneficiary.show', $beneficiary));

        $response->assertOk();
    }


    #[Test]
    public function edit_responds_with(): void
    {
        $beneficiary = Beneficiary::factory()->create();

        $response = $this->get(route('beneficiary.edit', $beneficiary));

        $response->assertOk();
    }


    #[Test]
    public function update_responds_with(): void
    {
        $beneficiary = Beneficiary::factory()->create();

        $response = $this->put(route('beneficiary.update', $beneficiary));

        $beneficiary->refresh();

        $response->assertOk();
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $beneficiary = Beneficiary::factory()->create();

        $response = $this->delete(route('beneficiary.destroy', $beneficiary));

        $response->assertNoContent();

        $this->assertModelMissing($beneficiary);
    }


    #[Test]
    public function error_responds_with(): void
    {
        $response = $this->get(route('beneficiary.error'));

        $response->assertNoContent(400);
    }
}
