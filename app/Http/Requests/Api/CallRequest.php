<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CallRequest extends FormRequest
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
            'user_id' => 'required|integer|exists:users,id',
            'beneficiary_id' => 'required|integer|exists:beneficiaries,id',
            'date' => 'required|date',
            'time' => 'required|time',
            'duration' => 'required|string',
            'call_type' => 'required|in:rutinary,emergency',
            'call_kind' => 'required|in:incoming,outgoing',
            'turn' => 'required|in:morning,afternoon,night',
            'answered_call' => 'required|boolean',
            'observations' => 'required|string',
            'description' => 'required|string',
            'contacted_112' => 'required|boolean',

        ];
    }
}
