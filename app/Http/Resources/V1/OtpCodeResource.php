<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\OtpCode;

class OtpCodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idOtpCode'=>$this->idOtpCode,
            'idUtilisateur'=>$this->idUtilisateur,
            'Email'=>$this->Email,
            'Otp'=>$this->Otp,
            
        ];
    }
}
