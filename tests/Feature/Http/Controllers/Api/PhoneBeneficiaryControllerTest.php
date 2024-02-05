<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\PhoneBeneficiary;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\PhoneBeneficiaryController
 */
final class PhoneBeneficiaryControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_responds_with(): void
    {
        $phoneBeneficiaries = PhoneBeneficiary::factory()->count(3)->create();

        $response = $this->get(route('phone-beneficiary.index'));

        $response->assertOk();
    }


    #[Test]
    public function create_responds_with(): void
    {
        $response = $this->get(route('phone-beneficiary.create'));

        $response->assertOk();
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\PhoneBeneficiaryController::class,
            'store',
            \App\Http\Requests\Api\PhoneBeneficiaryControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_responds_with(): void
    {
        $response = $this->post(route('phone-beneficiary.store'));

        $response->assertNoContent(201);

        $this->assertDatabaseHas(phoneBeneficiaries, [ /* ... */ ]);
    }


    #[Test]
    public function show_responds_with(): void
    {
        $phoneBeneficiary = PhoneBeneficiary::factory()->create();

        $response = $this->get(route('phone-beneficiary.show', $phoneBeneficiary));

        $response->assertOk();
    }


    #[Test]
    public function edit_responds_with(): void
    {
        $phoneBeneficiary = PhoneBeneficiary::factory()->create();

        $response = $this->get(route('phone-beneficiary.edit', $phoneBeneficiary));

        $response->assertOk();
    }


    #[Test]
    public function update_responds_with(): void
    {
        $phoneBeneficiary = PhoneBeneficiary::factory()->create();

        $response = $this->put(route('phone-beneficiary.update', $phoneBeneficiary));

        $phoneBeneficiary->refresh();

        $response->assertOk();
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $phoneBeneficiary = PhoneBeneficiary::factory()->create();

        $response = $this->delete(route('phone-beneficiary.destroy', $phoneBeneficiary));

        $response->assertNoContent();

        $this->assertModelMissing($phoneBeneficiary);
    }


    #[Test]
    public function error_responds_with(): void
    {
        $response = $this->get(route('phone-beneficiary.error'));

        $response->assertNoContent(400);
    }
}
