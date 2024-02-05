<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\PhoneContact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\PhoneContactController
 */
final class PhoneContactControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_responds_with(): void
    {
        $phoneContacts = PhoneContact::factory()->count(3)->create();

        $response = $this->get(route('phone-contact.index'));

        $response->assertOk();
    }


    #[Test]
    public function create_responds_with(): void
    {
        $response = $this->get(route('phone-contact.create'));

        $response->assertOk();
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\PhoneContactController::class,
            'store',
            \App\Http\Requests\Api\PhoneContactControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_responds_with(): void
    {
        $response = $this->post(route('phone-contact.store'));

        $response->assertNoContent(201);

        $this->assertDatabaseHas(phoneContacts, [ /* ... */ ]);
    }


    #[Test]
    public function show_responds_with(): void
    {
        $phoneContact = PhoneContact::factory()->create();

        $response = $this->get(route('phone-contact.show', $phoneContact));

        $response->assertOk();
    }


    #[Test]
    public function edit_responds_with(): void
    {
        $phoneContact = PhoneContact::factory()->create();

        $response = $this->get(route('phone-contact.edit', $phoneContact));

        $response->assertOk();
    }


    #[Test]
    public function update_responds_with(): void
    {
        $phoneContact = PhoneContact::factory()->create();

        $response = $this->put(route('phone-contact.update', $phoneContact));

        $phoneContact->refresh();

        $response->assertOk();
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $phoneContact = PhoneContact::factory()->create();

        $response = $this->delete(route('phone-contact.destroy', $phoneContact));

        $response->assertNoContent();

        $this->assertModelMissing($phoneContact);
    }
}
