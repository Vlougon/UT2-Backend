<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Beneficiary;
use App\Models\MedicalData;
use App\Models\MedicalDatum;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\MedicalDataController
 */
final class MedicalDataControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_responds_with(): void
    {
        $medicalData = MedicalData::factory()->count(3)->create();

        $response = $this->get(route('medical-datum.index'));

        $response->assertOk();
    }


    #[Test]
    public function create_responds_with(): void
    {
        $response = $this->get(route('medical-datum.create'));

        $response->assertOk();
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\MedicalDataController::class,
            'store',
            \App\Http\Requests\Api\MedicalDataControllerStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_responds_with(): void
    {
        $beneficiary = Beneficiary::factory()->create();
        $allergies = $this->faker->text();
        $morning_medication = $this->faker->text();
        $afternoon_medication = $this->faker->text();
        $night_medication = $this->faker->text();
        $emergency_room_on_town = $this->faker->randomElement(/** enum_attributes **/);
        $firehouse_on_town = $this->faker->randomElement(/** enum_attributes **/);
        $police_station_on_town = $this->faker->randomElement(/** enum_attributes **/);
        $outpatient_clinic_on_town = $this->faker->randomElement(/** enum_attributes **/);
        $ambulance_on_town = $this->faker->randomElement(/** enum_attributes **/);
        $illnesses = $this->faker->text();
        $preferent_morning_calls_hour = $this->faker->word();
        $preferent_afternoon_calls_hour = $this->faker->word();
        $preferent_night_calls_hour = $this->faker->word();

        $response = $this->post(route('medical-datum.store'), [
            'beneficiary_id' => $beneficiary->id,
            'allergies' => $allergies,
            'morning_medication' => $morning_medication,
            'afternoon_medication' => $afternoon_medication,
            'night_medication' => $night_medication,
            'emergency_room_on_town' => $emergency_room_on_town,
            'firehouse_on_town' => $firehouse_on_town,
            'police_station_on_town' => $police_station_on_town,
            'outpatient_clinic_on_town' => $outpatient_clinic_on_town,
            'ambulance_on_town' => $ambulance_on_town,
            'illnesses' => $illnesses,
            'preferent_morning_calls_hour' => $preferent_morning_calls_hour,
            'preferent_afternoon_calls_hour' => $preferent_afternoon_calls_hour,
            'preferent_night_calls_hour' => $preferent_night_calls_hour,
        ]);

        $medicalData = MedicalData::query()
            ->where('beneficiary_id', $beneficiary->id)
            ->where('allergies', $allergies)
            ->where('morning_medication', $morning_medication)
            ->where('afternoon_medication', $afternoon_medication)
            ->where('night_medication', $night_medication)
            ->where('emergency_room_on_town', $emergency_room_on_town)
            ->where('firehouse_on_town', $firehouse_on_town)
            ->where('police_station_on_town', $police_station_on_town)
            ->where('outpatient_clinic_on_town', $outpatient_clinic_on_town)
            ->where('ambulance_on_town', $ambulance_on_town)
            ->where('illnesses', $illnesses)
            ->where('preferent_morning_calls_hour', $preferent_morning_calls_hour)
            ->where('preferent_afternoon_calls_hour', $preferent_afternoon_calls_hour)
            ->where('preferent_night_calls_hour', $preferent_night_calls_hour)
            ->get();
        $this->assertCount(1, $medicalData);
        $medicalDatum = $medicalData->first();

        $response->assertNoContent(201);
    }


    #[Test]
    public function show_responds_with(): void
    {
        $medicalDatum = MedicalData::factory()->create();

        $response = $this->get(route('medical-datum.show', $medicalDatum));

        $response->assertOk();
    }


    #[Test]
    public function edit_responds_with(): void
    {
        $medicalDatum = MedicalData::factory()->create();

        $response = $this->get(route('medical-datum.edit', $medicalDatum));

        $response->assertOk();
    }


    #[Test]
    public function update_responds_with(): void
    {
        $medicalDatum = MedicalData::factory()->create();

        $response = $this->put(route('medical-datum.update', $medicalDatum));

        $medicalDatum->refresh();

        $response->assertOk();
    }


    #[Test]
    public function destroy_deletes_and_responds_with(): void
    {
        $medicalDatum = MedicalData::factory()->create();

        $response = $this->delete(route('medical-datum.destroy', $medicalDatum));

        $response->assertNoContent();

        $this->assertModelMissing($medicalDatum);
    }
}
