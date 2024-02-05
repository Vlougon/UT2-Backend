<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Contact;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\ContactController
 */
final class ContactControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_responds_with(): void
    {
        $contacts = Contact::factory()->count(3)->create();

        $response = $this->get(route('contact.index'));

        $response->assertOk();
    }


    #[Test]
    public function create_responds_with(): void
    {
        $response = $this->get(route('contact.create'));

        $response->assertOk();
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\ContactController::class,
            'store',
            \App\Http\Requests\Api\ContactControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_responds_with(): void
    {
        $name = $this->faker->name();
        $first_surname = $this->faker->word();
        $second_surname = $this->faker->word();
        $contact_type = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->post(route('contact.store'), [
            'name' => $name,
            'first_surname' => $first_surname,
            'second_surname' => $second_surname,
            'contact_type' => $contact_type,
        ]);

        $contacts = Contact::query()
            ->where('name', $name)
            ->where('first_surname', $first_surname)
            ->where('second_surname', $second_surname)
            ->where('contact_type', $contact_type)
            ->get();
        $this->assertCount(1, $contacts);
        $contact = $contacts->first();

        $response->assertNoContent(201);
    }


    #[Test]
    public function show_responds_with(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->get(route('contact.show', $contact));

        $response->assertOk();
    }


    #[Test]
    public function edit_responds_with(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->get(route('contact.edit', $contact));

        $response->assertOk();
    }


    #[Test]
    public function update_responds_with(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->put(route('contact.update', $contact));

        $contact->refresh();

        $response->assertOk();
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $contact = Contact::factory()->create();

        $response = $this->delete(route('contact.destroy', $contact));

        $response->assertNoContent();

        $this->assertModelMissing($contact);
    }
}
