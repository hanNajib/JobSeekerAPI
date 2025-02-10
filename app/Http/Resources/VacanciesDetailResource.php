<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacanciesDetailResource extends JsonResource
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
            'category' => $this->category,
            'company' => $this->company,
            'address' => $this->address,
            'description' => $this->description,
            'available_position' => $this->availablePosition->map(function($pos) {
                return [
                    'position' => $pos->position,
                    'capacity' => $pos->capacity,
                    'apply_capacity' => $pos->apply_capacity,
                    'apply_count' => count($pos->apply)
                ];
            }),
        ];
    }
}
