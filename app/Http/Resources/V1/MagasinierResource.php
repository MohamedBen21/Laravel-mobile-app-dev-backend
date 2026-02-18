<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MagasinierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idMagasinier'=>$this->idMagasinier,
            'idUtilisateur'=>$this->idUtilisateur,
            'idAdress'=>$this->idAdress,
            'Username'=>$this->Username,
            'salesCount'=>$this->salesCount,
            'imageMagasinier'=>$this->imageMagasinier,
            'isValid'=>$this->isValid,
            'magasins'=>MagasinResource::collection($this->whenLoaded('magasins'))
        ];
    }
}
