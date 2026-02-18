<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class StoreUtilisateurRequest extends FormRequest
{

    public function prepareForValidation()
    {
        if ($this->has('Password')) {
            $this->merge([
                'Password' => Hash::make($this->input('Password')),
            ]);
        }
    }
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
            'Nom'=>['required','string','min:3'],
            'Prenom'=>['required','string','min:3'],
            'Email'=>['required','email'],
            'Password'=>['required','string','min:6'],
            'Genre'=>['required','string','min:4'],
            'dateDeNaissance'=>['required'],
            'numTel'=>['required','integer'],
            'userType'=>['required','string','min:3']
        ];
    }
}
