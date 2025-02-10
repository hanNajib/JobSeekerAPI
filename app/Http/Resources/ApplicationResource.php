<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'job_vacancy_id' => $this->job_vacancy_id,  
            'category' => $this->jobVacancies->category,
            'company' => $this->jobVacancies->company,
            'address' => $this->jobVacancies->address,
            'positions' => $this->positions->map(function ($position) {
                return [
                    'position' => $position->position->position,
                    'apply_status' => $position->status,
                    'notes' => $this->notes,
                ];
            }),
        ];
    }
}
