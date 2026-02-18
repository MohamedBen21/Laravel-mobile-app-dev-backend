<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMethodRequest extends FormRequest
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
        $method = $this->method();

        if($method == 'PUT'){
            return [
                'Name'=>['required','string','min:5'],
                'Price'=>['required','integer']
            ];
        }else{
            return [
                'Name'=>['sometimes','required','string','min:5'],
                'Price'=>['sometimes','required','integer']
            ];
        }
    }
}
