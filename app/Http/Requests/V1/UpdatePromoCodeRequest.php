<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromoCodeRequest extends FormRequest
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
        if($method=='PUT'){
            'idAdmin'=>['required','ineteger'],
            'Name'=>['required','string','min:3'],
            'Description'=>['required','string','min:3'],
            'discountRate'=>['required','integer'],
            'startDate'=>['required'],
            'endDate'=>['required'],
        }else{
            'idAdmin'=>['sometimes','required','ineteger'],
            'Name'=>['sometimes','required','string','min:3'],
            'Description'=>['sometimes','required','string','min:3'],
            'discountRate'=>['sometimes','required','integer'],
            'startDate'=>['sometimes','required'],
            'endDate'=>['sometimes','required'],
        }
    }
}
