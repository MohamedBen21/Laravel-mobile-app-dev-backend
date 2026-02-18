<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMagasinierRequest extends FormRequest
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
          
            
                'idUtilisateur'=>['required','integer'],
                'idAdress'=>['required','integer'],
                'Username'=>['required','string','min:5'],
                'imageMagasinier'=>['required', 'image','mimes:jpeg,png,jpg,gif','max:2048'],
                'salesCount'=>['required','integer'],
                'isValid'=>1
            ];
        }else{
            return [
          
            
                'idUtilisateur'=>['sometimes','required','integer'],
                'idAdress'=>['sometimes','required','integer'],
                'Username'=>['sometimes','required','string','min:5'],
                'imageMagasinier'=>['sometimes','required', 'image','mimes:jpeg,png,jpg,gif','max:2048'],
                'salesCount'=>['sometimes','required','integer'],
            ];
        }
    }
}
