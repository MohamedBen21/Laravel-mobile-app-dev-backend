<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idAdmin'=>$this->idAdmin,
            'idUtilisateur'=>$this->idUtilisateur,
            'Role'=>$this->Role,
            'Username'=>$this->Username
        ];
    }
}
