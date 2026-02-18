<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReportRequest extends FormRequest
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
            return [
                'reporterType'=>['required','string'],
                'idReporter'=>['required','integer'],
                'reportedType'=>['required','string'],
                'idReported'=>['required','integer'],
                'reportDate'=>['required'],
                'reason'=>['required'],
                'status'=>['required','string']
                ];
        }else{
            return [
                'reporterType'=>['sometimes','required','string'],
                'idReporter'=>['sometimes','required','integer'],
                'reportedType'=>['sometimes','required','string'],
                'idReported'=>['sometimes','required','integer'],
                'reportDate'=>['sometimes','required'],
                'reason'=>['sometimes','required'],
                'status'=>['sometimes','required','string']
                ];
        }
    }
}
