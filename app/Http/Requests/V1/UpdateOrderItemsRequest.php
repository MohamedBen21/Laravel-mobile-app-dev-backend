<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderItemsRequest extends FormRequest
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
                'idProductItem'=>['required','integer'],
                'idOrder'=>['required','integer'],
                'qteItem'=>['required','integer'],
                'Price'=>['required']
            ];
        }else{
            return [
                'idProductItem'=>['sometimes','required','integer'],
                'idOrder'=>['sometimes','required','integer'],
                'qteItem'=>['sometimes','required','integer'],
                'Price'=>['sometimes','required']
            ];
        }
    }
}
