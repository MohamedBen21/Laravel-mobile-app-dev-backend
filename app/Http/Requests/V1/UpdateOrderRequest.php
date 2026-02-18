<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
                'idClient'=>['required','integer'],
                'idAdress'=>['required','integer'],
                'idMethod'=>['required','integer'],
                'idStatus'=>['required','integer'],
                'orderDate'=>['required'],
                'totalPrice'=>['required']
            ];
        }else{
            return [
                'idClient'=>['sometimes','required','integer'],
                'idAdress'=>['sometimes','required','integer'],
                'idMethod'=>['someitmes','required','integer'],
                'idStatus'=>['sometimes','required','integer'],
                'orderDate'=>['sometimes','required'],
                'totalPrice'=>['sometimes','required']
            ];
        }
    }
}
