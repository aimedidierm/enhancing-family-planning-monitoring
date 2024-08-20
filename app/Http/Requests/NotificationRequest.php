<?php

namespace App\Http\Requests;

use App\Enums\ContraceptiveMethod;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use ReflectionClass;

class NotificationRequest extends FormRequest
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
            "method" => ["required", "string", Rule::in(array_values((new ReflectionClass(ContraceptiveMethod::class))->getConstants()))],
            "title" => "required|string",
            "message" => "required|string",
        ];
    }
}
