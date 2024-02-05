<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\AddressController
 */
final class AddressControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_responds_with(): void
    {
        $addresses = Address::factory()->count(3)->create();

        $response = $this->get(route('address.index'));

        $response->assertOk();
    }


    #[Test]
    public function create_responds_with(): void
    {
        $response = $this->get(route('address.create'));

        $response->assertOk();
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\AddressController::class,
            'store',
            \App\Http\Requests\Api\AddressControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_responds_with(): void
    {
        $locality = $this->faker->word();
        $postal_code = $this->faker->postcode();
        $province = $this->faker->word();
        $number = $this->faker->word();
        $street = $this->faker->streetName();

        $response = $this->post(route('address.store'), [
            'locality' => $locality,
            'postal_code' => $postal_code,
            'province' => $province,
            'number' => $number,
            'street' => $street,
        ]);

        $addresses = Address::query()
            ->where('locality', $locality)
            ->where('postal_code', $postal_code)
            ->where('province', $province)
            ->where('number', $number)
            ->where('street', $street)
            ->get();
        $this->assertCount(1, $addresses);
        $address = $addresses->first();

        $response->assertNoContent(201);
    }


    #[Test]
    public function show_responds_with(): void
    {
        $address = Address::factory()->create();

        $response = $this->get(route('address.show', $address));

        $response->assertOk();
    }


    #[Test]
    public function edit_responds_with(): void
    {
        $address = Address::factory()->create();

        $response = $this->get(route('address.edit', $address));

        $response->assertOk();
    }


    #[Test]
    public function update_responds_with(): void
    {
        $address = Address::factory()->create();

        $response = $this->put(route('address.update', $address));

        $address->refresh();

        $response->assertOk();
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $address = Address::factory()->create();

        $response = $this->delete(route('address.destroy', $address));

        $response->assertNoContent();

        $this->assertModelMissing($address);
    }
}
