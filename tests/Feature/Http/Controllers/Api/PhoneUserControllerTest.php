<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\PhoneUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\PhoneUserController
 */
final class PhoneUserControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_responds_with(): void
    {
        $phoneUsers = PhoneUser::factory()->count(3)->create();

        $response = $this->get(route('phone-user.index'));

        $response->assertOk();
    }


    #[Test]
    public function create_responds_with(): void
    {
        $response = $this->get(route('phone-user.create'));

        $response->assertOk();
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\PhoneUserController::class,
            'store',
            \App\Http\Requests\Api\PhoneUserControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_responds_with(): void
    {
        $response = $this->post(route('phone-user.store'));

        $response->assertNoContent(201);

        $this->assertDatabaseHas(phoneUsers, [ /* ... */ ]);
    }


    #[Test]
    public function show_responds_with(): void
    {
        $phoneUser = PhoneUser::factory()->create();

        $response = $this->get(route('phone-user.show', $phoneUser));

        $response->assertOk();
    }


    #[Test]
    public function edit_responds_with(): void
    {
        $phoneUser = PhoneUser::factory()->create();

        $response = $this->get(route('phone-user.edit', $phoneUser));

        $response->assertOk();
    }


    #[Test]
    public function update_responds_with(): void
    {
        $phoneUser = PhoneUser::factory()->create();

        $response = $this->put(route('phone-user.update', $phoneUser));

        $phoneUser->refresh();

        $response->assertOk();
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $phoneUser = PhoneUser::factory()->create();

        $response = $this->delete(route('phone-user.destroy', $phoneUser));

        $response->assertNoContent();

        $this->assertModelMissing($phoneUser);
    }


    #[Test]
    public function error_responds_with(): void
    {
        $response = $this->get(route('phone-user.error'));

        $response->assertNoContent(400);
    }
}
