<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idOrderItem'=>$this->idOrderItem,
            'idProductItem'=>$this->idProductItem,
            'idOrder'=>$this->idOrder,
            'qteItem'=>$this->qteItem,
            'Price'=>$this->Price
        ];
    }
}
