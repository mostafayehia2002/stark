<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'booking_id' => $this->booking_id,
            'booking_date' => $this->booking_date,
            'unit_title' => $this->unit->title,
            'status' => $this->status,
            'created_at' => $this->created_at
        ];
    }
}
