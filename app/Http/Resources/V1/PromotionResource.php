<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PromotionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idPromotion'=>$this->idPromotion,
            'Name'=>$this->Name,
            'Description'=>$this->Description,
            'discountRate'=>$this->discountRate,
            'startDate'=>$this->startDate,
            'endDate'=>$this->endDate,
        ];
    }
}
