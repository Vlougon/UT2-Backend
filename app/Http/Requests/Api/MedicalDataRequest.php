<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class MedicalDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'beneficiary_id' => 'required|integer|exists:beneficiaries,id',
            'allergies' => 'required|string',
            'illnesses' => 'required|string',
            'morning_medication' => 'required|string',
            'afternoon_medication' => 'required|string',
            'night_medication' => 'required|string',
            'preferent_morning_calls_hour' => 'required|time',
            'preferent_afternoon_calls_hour' => 'required|time',
            'preferent_night_calls_hour' => 'required|time',
            'emergency_room_on_town' => 'required|in:Yes,No',
            'firehouse_on_town' => 'required|in:Yes,No',
            'police_station_on_town' => 'required|in:Yes,No',
            'outpatient_clinic_on_town' => 'required|in:Yes,No',
            'ambulance_on_town' => 'required|in:Yes,No',
        ];
    }
}
