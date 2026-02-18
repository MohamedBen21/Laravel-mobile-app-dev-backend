<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Utilisateur;

class StoreClientRequest extends FormRequest
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
            
            'idUtilisateur'=>['required','integer','exists:utilisateurs,idUtilisateur','unique:utilisateurs,idUtilisateur'],
            'idAdress'=>['required','integer'],
            'Username'=>['required','string','min:5'],
            'clientImage'=>['required', 'image','mimes:jpeg,png,jpg,gif','max:2048'],
            'buysCount'=>['required','integer']
        ];
    }
}
