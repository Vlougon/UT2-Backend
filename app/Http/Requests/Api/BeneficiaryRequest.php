<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class BeneficiaryRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'dni' =>[ 'required', 'varchar'],
            'gender' => ['required', 'in:Male,Female,Other'],
            'marital_status' => ['required', 'in:Single,Engaged,Married,Divorced,Uncoupled,Widower'],
            'beneficiary_type' => ['required', 'in:Above65,65-45,44-30,29-19,18-12,Below12'],
            'social_security_number' => ['required', 'string'],
            'rutine' => ['required', 'string'],
            'second_surname' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
        ];
    }
}
