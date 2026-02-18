<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MagasinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idMagasin'=>$this->idMagasin,
            'idMagasinier'=>$this->idMagasinier,
            'Category'=>$this->Category,
            'name'=>$this->name,
            'magasinImage'=>$this->magasinImage,
            'products'=>ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
