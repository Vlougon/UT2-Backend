<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Beneficiary;
use App\Models\Call;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\CallController
 */
final class CallControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_responds_with(): void
    {
        $calls = Call::factory()->count(3)->create();

        $response = $this->get(route('call.index'));

        $response->assertOk();
    }


    #[Test]
    public function create_responds_with(): void
    {
        $response = $this->get(route('call.create'));

        $response->assertOk();
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\CallController::class,
            'store',
            \App\Http\Requests\Api\CallControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_responds_with(): void
    {
        $user = User::factory()->create();
        $beneficiary = Beneficiary::factory()->create();
        $date = $this->faker->date();
        $time = $this->faker->dateTime();
        $duration = $this->faker->numberBetween(-10000, 10000);
        $call_type = $this->faker->randomElement(/** enum_attributes **/);
        $turn = $this->faker->randomElement(/** enum_attributes **/);
        $answered_call = $this->faker->boolean();
        $observations = $this->faker->text();
        $description = $this->faker->text();
        $contacted_112 = $this->faker->boolean();

        $response = $this->post(route('call.store'), [
            'user_id' => $user->id,
            'beneficiary_id' => $beneficiary->id,
            'date' => $date,
            'time' => $time,
            'duration' => $duration,
            'call_type' => $call_type,
            'turn' => $turn,
            'answered_call' => $answered_call,
            'observations' => $observations,
            'description' => $description,
            'contacted_112' => $contacted_112,
        ]);

        $calls = Call::query()
            ->where('user_id', $user->id)
            ->where('beneficiary_id', $beneficiary->id)
            ->where('date', $date)
            ->where('time', $time)
            ->where('duration', $duration)
            ->where('call_type', $call_type)
            ->where('turn', $turn)
            ->where('answered_call', $answered_call)
            ->where('observations', $observations)
            ->where('description', $description)
            ->where('contacted_112', $contacted_112)
            ->get();
        $this->assertCount(1, $calls);
        $call = $calls->first();

        $response->assertNoContent(201);
    }


    #[Test]
    public function show_responds_with(): void
    {
        $call = Call::factory()->create();

        $response = $this->get(route('call.show', $call));

        $response->assertOk();
    }


    #[Test]
    public function edit_responds_with(): void
    {
        $call = Call::factory()->create();

        $response = $this->get(route('call.edit', $call));

        $response->assertOk();
    }


    #[Test]
    public function update_responds_with(): void
    {
        $call = Call::factory()->create();

        $response = $this->put(route('call.update', $call));

        $call->refresh();

        $response->assertOk();
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $call = Call::factory()->create();

        $response = $this->delete(route('call.destroy', $call));

        $response->assertNoContent();

        $this->assertModelMissing($call);
    }


    #[Test]
    public function error_responds_with(): void
    {
        $response = $this->get(route('call.error'));

        $response->assertNoContent(400);
    }
}
