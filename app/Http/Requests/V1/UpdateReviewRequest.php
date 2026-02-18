<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReviewRequest extends FormRequest
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
                'idClient'=>['required','integer'],
                'idOrderItem'=>['required','integer'],
                'Rating'=>['required'],
                'Comment'=>['required','string','min:5']
            ];
        }else{
            return [
                'idClient'=>['sometimes','required','integer'],
                'idOrderItem'=>['sometimes','required','integer'],
                'Rating'=>['sometimes','required'],
                'Comment'=>['someitmes','required','string','min:5']
            ];
        }
    }
}
