<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Beneficiary;
use App\Models\Reminder;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\ReminderController
 */
final class ReminderControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_responds_with(): void
    {
        $reminders = Reminder::factory()->count(3)->create();

        $response = $this->get(route('reminder.index'));

        $response->assertOk();
    }


    #[Test]
    public function create_responds_with(): void
    {
        $response = $this->get(route('reminder.create'));

        $response->assertOk();
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\ReminderController::class,
            'store',
            \App\Http\Requests\Api\ReminderControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_responds_with(): void
    {
        $user = User::factory()->create();
        $beneficiary = Beneficiary::factory()->create();
        $title = $this->faker->sentence(4);
        $terminated = $this->faker->randomElement(/** enum_attributes **/);
        $observations = $this->faker->text();
        $start_date = $this->faker->date();
        $end_date = $this->faker->date();
        $start_time = $this->faker->time();
        $end_time = $this->faker->time();

        $response = $this->post(route('reminder.store'), [
            'user_id' => $user->id,
            'beneficiary_id' => $beneficiary->id,
            'title' => $title,
            'terminated' => $terminated,
            'observations' => $observations,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'start_time' => $start_time,
            'end_time' => $end_time,
        ]);

        $reminders = Reminder::query()
            ->where('user_id', $user->id)
            ->where('beneficiary_id', $beneficiary->id)
            ->where('title', $title)
            ->where('terminated', $terminated)
            ->where('observations', $observations)
            ->where('start_date', $start_date)
            ->where('end_date', $end_date)
            ->where('start_time', $start_time)
            ->where('end_time', $end_time)
            ->get();
        $this->assertCount(1, $reminders);
        $reminder = $reminders->first();

        $response->assertNoContent(201);
    }


    #[Test]
    public function show_responds_with(): void
    {
        $reminder = Reminder::factory()->create();

        $response = $this->get(route('reminder.show', $reminder));

        $response->assertOk();
    }


    #[Test]
    public function edit_responds_with(): void
    {
        $reminder = Reminder::factory()->create();

        $response = $this->get(route('reminder.edit', $reminder));

        $response->assertOk();
    }


    #[Test]
    public function update_responds_with(): void
    {
        $reminder = Reminder::factory()->create();

        $response = $this->put(route('reminder.update', $reminder));

        $reminder->refresh();

        $response->assertOk();
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $reminder = Reminder::factory()->create();

        $response = $this->delete(route('reminder.destroy', $reminder));

        $response->assertNoContent();

        $this->assertModelMissing($reminder);
    }
}
