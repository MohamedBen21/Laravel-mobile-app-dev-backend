<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idProductItem'=>$this->idProductItem,
            'idProduct'=>$this->idProduct,
            'qteStock'=>$this->qteStock,
            'Price'=>$this->Price,
            'productItemImage'=>$this->productItemImage
        ];
    }
}
