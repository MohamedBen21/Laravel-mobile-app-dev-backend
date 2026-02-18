<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PromoCodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idPromoCode'=>$this->idPromoCode,
            'idAdmin'=>$this->idAdmin,
            'Name'=>$this->Name,
            'Description'=>$this->Description,
            'discountRate'=>$this->discountRate,
            'startDate'=>$this->startDate,
            'endDate'=>$this->endDate,
        ];
    }
}
