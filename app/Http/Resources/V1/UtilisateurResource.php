<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UtilisateurResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idUtilisateur'=>$this->idUtilisateur,
            'Nom'=>$this->Nom,
            'Prenom'=>$this->Prenom,
            'Email'=>$this->Email,
            'Password'=>$this->Password,
            'Genre'=>$this->Genre,
            'dateDeNaissance'=>$this->dateDeNaissance,
            'numTel'=>$this->numTel,
            'userType'=>$this->userType
        ];
    }
}
