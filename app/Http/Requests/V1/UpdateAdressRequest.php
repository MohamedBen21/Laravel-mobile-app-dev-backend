<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdressRequest extends FormRequest
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
        $method=$this->method();
        if($method == 'PUT'){
            return [
                'postalCode'=>['required','integer'],
                'Region'=>['required','string','min:4'],
                'streetLine'=>['required','string','min:5'],
                'houseNumber'=>['required','integer'],
                'City'=>['required','string','min:4'],
                'Country'=>['required','string','min:4'],
    
            ];
        }else{
            return [
                'postalCode'=>['sometimes','required','integer'],
                'Region'=>['sometimes','required','string','min:4'],
                'streetLine'=>['sometimes','required','string','min:5'],
                'houseNumber'=>['sometimes','required','integer'],
                'City'=>['sometimes','required','string','min:4'],
                'Country'=>['sometimes','required','string','min:4'],
    
            ];
        }
    }
}
