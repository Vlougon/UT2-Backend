<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\UserController
 */
final class UserControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_responds_with(): void
    {
        $users = User::factory()->count(3)->create();

        $response = $this->get(route('user.index'));

        $response->assertOk();
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\UserController::class,
            'store',
            \App\Http\Requests\Api\UserControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_responds_with(): void
    {
        $name = $this->faker->name();
        $password = $this->faker->password();
        $role = $this->faker->randomElement(/** enum_attributes **/);
        $email = $this->faker->safeEmail();

        $response = $this->post(route('user.store'), [
            'name' => $name,
            'password' => $password,
            'role' => $role,
            'email' => $email,
        ]);

        $users = User::query()
            ->where('name', $name)
            ->where('password', $password)
            ->where('role', $role)
            ->where('email', $email)
            ->get();
        $this->assertCount(1, $users);
        $user = $users->first();

        $response->assertNoContent(201);
    }


    #[Test]
    public function show_responds_with(): void
    {
        $user = User::factory()->create();

        $response = $this->get(route('user.show', $user));

        $response->assertOk();
    }


    #[Test]
    public function edit_responds_with(): void
    {
        $user = User::factory()->create();

        $response = $this->get(route('user.edit', $user));

        $response->assertOk();
    }


    #[Test]
    public function update_responds_with(): void
    {
        $user = User::factory()->create();

        $response = $this->put(route('user.update', $user));

        $user->refresh();

        $response->assertOk();
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $user = User::factory()->create();

        $response = $this->delete(route('user.destroy', $user));

        $response->assertNoContent();

        $this->assertModelMissing($user);
    }


    #[Test]
    public function error_responds_with(): void
    {
        $response = $this->get(route('user.error'));

        $response->assertNoContent(400);
    }
}
