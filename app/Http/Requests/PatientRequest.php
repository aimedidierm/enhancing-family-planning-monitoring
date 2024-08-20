<?php

namespace App\Http\Requests;

use App\Enums\PatientSex;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use ReflectionClass;

class PatientRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string',
            'phone' => ['required', 'numeric', 'regex:/^07[8|9|3|2][0-9]{7}$/'],
            'dob' => 'required|date',
            'email' => ['nullable', 'email'],
            'sex' => ['required', Rule::in(array_values((new ReflectionClass(PatientSex::class))->getConstants()))],
            'address' => 'required|string',
        ];

        // Check if the request is for updating a patient
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            // Extract the patient ID from the route
            $patientId = $this->route('patient');

            // Add unique rule for email if it's not an update request
            $rules['email'][] = Rule::unique('patients')->ignore($patientId);
        } else {
            // Add unique rule for email if it's a create request
            $rules['email'][] = 'unique:patients';
        }

        return $rules;
    }
}
