<?php

namespace App\Http\Requests;

use App\Enums\ContraceptiveMethod;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use ReflectionClass;

class ContraceptiveRequest extends FormRequest
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
        return [
            "patient" => "required|numeric",
            "method" => ["required", "string", Rule::in(array_values((new ReflectionClass(ContraceptiveMethod::class))->getConstants()))],
            "due" => "required|date",
            'reminder_datetime' => 'required|date_format:Y-m-d\TH:i',
        ];
    }
}
