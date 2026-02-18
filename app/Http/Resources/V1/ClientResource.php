<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idClient'=>$this->idClient,
            'idUtilisateur'=>$this->idUtilisateur,
            'idAdress'=>$this->idAdress,
            'Username'=>$this->Username,
            'clientImage'=>$this->clientImage,
            'buysCount'=>$this->buysCount
        ];
    }
}
