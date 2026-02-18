<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UpdateUtilisateurRequest extends FormRequest
{
    public function prepareForValidation()
    {
        if ($this->has('Password') && strlen($this->input('Password')) < 6) {
            
            $this->merge([
                'Password' => null, // Clear the password field to prevent hashing
            ]);
            $this->addError('Password', 'The password must be at least 6 characters long.');
            
        }else{ 
            
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
        $method = $this->method();
        if($method == 'PUT'){
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
        }else{
            return [
                'Nom'=>['sometimes','required','string','min:3'],
                'Prenom'=>['sometimes','required','string','min:3'],
                'Email'=>['sometimes','required','email'],
                'Password'=>['sometimes','required','string','min:6'],
                'Genre'=>['sometimes','required','string','min:4'],
                'dateDeNaissance'=>['sometimes','required'],
                'numTel'=>['sometimes','required','integer'],
                'userType'=>['sometimes','required','string','min:3']
            ];
        }
    }
}
