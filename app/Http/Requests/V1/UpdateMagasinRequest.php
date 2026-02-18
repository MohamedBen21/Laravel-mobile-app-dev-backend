<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMagasinRequest extends FormRequest
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
                'idMagasinier'=>['required','intger'],
                'Category'=>['required','string','min:5'],
                'name'=>['required','string','min:3'],
                'magasinImage'=>['required','string','min:5'],
            ];
        }else{
            return [
                'idMagasinier'=>['sometimes','required','intger'],
                'Category'=>['sometimes','required','string','min:5'],
                'name'=>['sometimes','required','string','min:3'],
                'magasinImage'=>['sometimes','required','string','min:5'],
            ];
        }
    }
}
