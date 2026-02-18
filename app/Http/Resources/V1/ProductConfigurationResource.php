<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductConfigurationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idProductConfiguration'=>$this->idProductConfiguration,
            'idProductItem'=>$this->idProductItem,
            'idVariationOption'=>$this->idVariationOption,
        ];
    }
}
