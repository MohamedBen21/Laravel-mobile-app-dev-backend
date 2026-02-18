<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'idReport'=>$this->idReport,
            'reporterType'=>$this->reporterType,
            'idReporter'=>$this->idReporter,
            'reportedType'=>$this->reportedType,
            'idReported'=>$this->idReported,
            'reportDate'=>$this->reportDate,
            'reason'=>$this->reason,
            'status'=>$this->status,
            
        ];
    }
}
