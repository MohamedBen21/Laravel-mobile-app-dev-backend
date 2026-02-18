<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Utilisateur;
use App\Models\OtpCode;

class StoreOtpCodeRequest extends FormRequest
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
            'idUtilisateur' => ['required', 'integer'],
            'Email' => [
                'required',
                'string',
                'email',
                'exists:utilisateurs,Email', 
                function ($attribute, $value, $fail) {
                    
                    if (\App\Models\OtpCode::where('Email', $value)->exists()) {
                        $fail('The email has already been taken.');
                    }
                },
            ],
            'Otp' => ['required', 'integer'],
        ];
    }
}
