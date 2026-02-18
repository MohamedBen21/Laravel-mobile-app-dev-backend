<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Utilisateur;

class UpdateOtpCodeRequest extends FormRequest
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
            'idUtilisateur'=>['required','integer'],
            'Email'=>['required','String','email','exists:utilisateurs,Email'],
            'Otp'=>['required','integer'],
        ];
       }else{
        return [
            'idUtilisateur'=>['sometimes','required','integer'],
            'Email'=>['sometimes','required','String','email','exists:utilisateurs,Email'],
            'Otp'=>['sometimes','required','integer'],
        ];
       }
    }
}
