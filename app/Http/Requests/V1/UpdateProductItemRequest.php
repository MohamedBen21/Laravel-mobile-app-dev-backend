<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductItemRequest extends FormRequest
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
                'idProduct'=>['required','integer'],
                'qteStock'=>['required','integer'],
                'Price'=>['required'],
                'productItemImage'=>['required','string','min:5']
            ];
        }else{
            return [
                'idProduct'=>['sometimes','required','integer'],
                'qteStock'=>['sometimes','required','integer'],
                'Price'=>['sometimes','required'],
                'productItemImage'=>['sometimes','required','string','min:5']
            ];
        }
    }
}
