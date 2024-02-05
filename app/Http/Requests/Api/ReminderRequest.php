<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ReminderStoreRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'beneficiary_id' => ['required', 'integer', 'exists:beneficiaries,id'],
            'title' => ['required', 'string'],
            'terminated' => ['required', 'in:Yes,No'],
            'observations' => ['required', 'string'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date'],
            'start_time' => ['required'],
            'end_time' => ['required'],
        ];
    }
}
