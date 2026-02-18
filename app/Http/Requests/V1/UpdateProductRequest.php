<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
                'idMagasin'=>['required','integer'],
                'Name'=>['required','string','min:3'],
                'Description'=>['required','string','min:5'],
                'Category'=>['required','string'],
                'productImage'=>['required','string','min:3']
            ];
        }else{
            return [
                'idMagasin'=>['sometimes','required','integer'],
                'Name'=>['sometimes','required','string','min:3'],
                'Description'=>['sometimes','required','string','min:5'],
                'Category'=>['sometimes','required','string'],
                'productImage'=>['sometimes','required','string','min:3']
            ];
        }
    }
}
