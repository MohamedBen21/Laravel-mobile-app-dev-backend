<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idAdress'=>$this->idAdress,
            'postalCode'=>$this->postalCode,
            'Region'=>$this->Region,
            'streetLine'=>$this->streetLine,
            'houseNumber'=>$this->houseNumber,
            'City'=>$this->City,
            'Country'=>$this->Country
        ];
    }
}
