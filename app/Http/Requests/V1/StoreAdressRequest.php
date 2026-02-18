<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdressRequest extends FormRequest
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
            'postalCode'=>['required','integer'],
            'Region'=>['required','string','min:4'],
            'streetLine'=>['required','string','min:5'],
            'houseNumber'=>['required','integer'],
            'City'=>['required','string','min:4'],
            'Country'=>['required','string','min:4'],

        ];
    }
}
