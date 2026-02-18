<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePromotionProductItemRequest extends FormRequest
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
        $method= $this->method();
        if($method =='PUT'){
            return [
                'idPromotion'=>['required','integer'],
                'idProductItem'=>['required','integer']
            ];
        }else{
            return [
                'idPromotion'=>['sometimes','required','integer'],
                'idProductItem'=>['sometimes','required','integer']
            ];
        }
    }
}
